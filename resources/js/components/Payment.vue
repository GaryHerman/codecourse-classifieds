<template>
    <form v-if="loaded" id="payment-form" method="post">
        <div id="dropin"></div>
        <button v-if="showSubmitButton" :disabled="checkOutStep===3" type="submit" class="btn btn-primary float-md-right">
            {{ buttonText[checkOutStep] || 'Next' }}
        </button>
        <input type="hidden" name="_token" :value="csrfToken">
        <input type="hidden" id="nonce" name="payment_method_nonce"/>
    </form>
    <div v-else>Loading Payment Form</div>
</template>

<script>
    var dropin      = require('braintree-web-drop-in');
    var braintree   = require('braintree-web');

    export default {
        data() {
            return {
                loaded: false,
                showSubmitButton: false,
                checkOutStep: 1,
                buttonText: {
                    1: 'Next',
                    2: 'Complete',
                    3: 'Processing...',
                },
                csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        mounted () {
            console.log("Payment component mounted");
            // Get Client Payment Token
            axios
                .get('/braintree/token')
                .then((response) => {
                    console.log("Response received.");

                    this.loaded = true;

                    // Setup BrainTree DropIn Container Form
                    dropin.create({
                        authorization: response.data.data.token,
                        container: '#dropin',
                        // applePay: {
                        //     displayName: 'Merchant Name',
                        //     paymentRequest: {
                        //     label: 'Localized Name',
                        //     total: '10.00'
                        //     }
                        // },
                        // paypal: {
                        //     flow: 'checkout',
                        //     amount: '10.00',
                        //     currency: 'USD'
                        // },
                        // paypalCredit: {
                        //     flow: 'checkout',
                        //     amount: '10.00',
                        //     currency: 'USD'
                        // },
                        // venmo: true

                    // Callback
                    }, (error, dropinInstance) => {

                        if (error) console.error(error);

                        this.showSubmitButton = true;

                        // braintree.dataCollector.create({
                        //     client: dropinInstance
                        //     }, function (err, dataCollectorInstance) {
                        //             if (err) {
                        //             // Handle error in creation of data collector
                        //             return;
                        //             }
                        //             // At this point, you should access the dataCollectorInstance.deviceData value and provide it
                        //             // to your server, e.g. by injecting it into your form as a hidden input.
                        //             var deviceData = dataCollectorInstance.deviceData;
                        //     }
                        // );
                        dropinInstance.on('changeActiveView', (viewObj) => {
                            // console.log(viewObj.previousViewId, viewObj.newViewId);
                            if (viewObj.newViewId === 'methods') {
                                this.checkOutStep = 2;
                            } else {
                                this.checkOutStep = 1;
                            }
                        });

                        const form = document.getElementById('payment-form');

                        form.addEventListener('submit', event => {
                            if (this.checkOutStep === 2) {
                                this.checkOutStep = 3;
                                return;
                            }
                            event.preventDefault();

                            dropinInstance.requestPaymentMethod((error, payload) => {
                                if (error) console.error(error);
                                console.log(payload);
                                // Step four: when the user is ready to complete their
                                //   transaction, use the dropinInstance to get a payment
                                //   method nonce for the user's selected payment method, then add
                                //   it a the hidden field before submitting the complete form to
                                //   a server-side integration
                                document.getElementById('nonce').value = payload.nonce;
                            });
                        });
                    });
                })
                .catch(err => {
                    console.log(err);
                });
        }
    };
</script>
