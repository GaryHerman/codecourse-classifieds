--
-- PostgreSQL database dump
--

-- Dumped from database version 12.18 (Ubuntu 12.18-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.18 (Ubuntu 12.18-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: areas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.areas (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255),
    _lft integer DEFAULT 0 NOT NULL,
    _rgt integer DEFAULT 0 NOT NULL,
    parent_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    usable boolean DEFAULT false NOT NULL
);


ALTER TABLE public.areas OWNER TO postgres;

--
-- Name: areas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.areas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.areas_id_seq OWNER TO postgres;

--
-- Name: areas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.areas_id_seq OWNED BY public.areas.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    price double precision DEFAULT '0'::double precision NOT NULL,
    _lft integer DEFAULT 0 NOT NULL,
    _rgt integer DEFAULT 0 NOT NULL,
    parent_id integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    usable boolean DEFAULT false NOT NULL
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: favoriteables; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.favoriteables (
    id bigint NOT NULL,
    user_id integer NOT NULL,
    favoriteable_id integer NOT NULL,
    favoriteable_type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.favoriteables OWNER TO postgres;

--
-- Name: favoriteables_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.favoriteables_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favoriteables_id_seq OWNER TO postgres;

--
-- Name: favoriteables_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.favoriteables_id_seq OWNED BY public.favoriteables.id;


--
-- Name: listings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.listings (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    body text NOT NULL,
    user_id integer NOT NULL,
    area_id integer NOT NULL,
    category_id integer NOT NULL,
    live boolean DEFAULT false NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    published_at timestamp(0) without time zone
);


ALTER TABLE public.listings OWNER TO postgres;

--
-- Name: listings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.listings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.listings_id_seq OWNER TO postgres;

--
-- Name: listings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.listings_id_seq OWNED BY public.listings.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: user_listing_views; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_listing_views (
    id bigint NOT NULL,
    user_id integer NOT NULL,
    listing_id integer NOT NULL,
    count integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.user_listing_views OWNER TO postgres;

--
-- Name: user_listing_views_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_listing_views_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_listing_views_id_seq OWNER TO postgres;

--
-- Name: user_listing_views_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_listing_views_id_seq OWNED BY public.user_listing_views.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: areas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas ALTER COLUMN id SET DEFAULT nextval('public.areas_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: favoriteables id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoriteables ALTER COLUMN id SET DEFAULT nextval('public.favoriteables_id_seq'::regclass);


--
-- Name: listings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.listings ALTER COLUMN id SET DEFAULT nextval('public.listings_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: user_listing_views id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_listing_views ALTER COLUMN id SET DEFAULT nextval('public.user_listing_views_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: areas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.areas (id, name, slug, _lft, _rgt, parent_id, created_at, updated_at, usable) FROM stdin;
3	Auburn	us.alabama.auburn	3	4	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
4	Birmingham	us.alabama.birmingham	5	6	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
5	Dothan	us.alabama.dothan	7	8	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
6	Florence / Muscle shoals	us.alabama.florence-muscle-shoals	9	10	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
7	Huntsville / Decatur	us.alabama.huntsville-decatur	11	12	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
8	Mobile	us.alabama.mobile	13	14	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
9	Montgomery	us.alabama.montgomery	15	16	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
2	Alabama	us.alabama	2	19	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
10	Tuscaloosa	us.alabama.tuscaloosa	17	18	2	2021-10-21 19:30:38	2021-10-21 19:30:38	t
12	Anchorage / Mat-su	us.alaska.anchorage-mat-su	21	22	11	2021-10-21 19:30:38	2021-10-21 19:30:38	t
13	Fairbanks	us.alaska.fairbanks	23	24	11	2021-10-21 19:30:38	2021-10-21 19:30:38	t
14	Kenai Peninsula	us.alaska.kenai-peninsula	25	26	11	2021-10-21 19:30:38	2021-10-21 19:30:38	t
11	Alaska	us.alaska	20	29	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
15	Southeast Alaska	us.alaska.southeast-alaska	27	28	11	2021-10-21 19:30:38	2021-10-21 19:30:38	t
17	Flagstaff / Sedona	us.arizona.flagstaff-sedona	31	32	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
18	Mohave County	us.arizona.mohave-county	33	34	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
19	Phoenix	us.arizona.phoenix	35	36	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
20	Prescott	us.arizona.prescott	37	38	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
21	Show Low	us.arizona.show-low	39	40	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
22	Sierra Vista	us.arizona.sierra-vista	41	42	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
23	Tucson	us.arizona.tucson	43	44	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
16	Arizona	us.arizona	30	47	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
24	Yuma	us.arizona.yuma	45	46	16	2021-10-21 19:30:38	2021-10-21 19:30:38	t
26	Fayetteville	us.arkansas.fayetteville	49	50	25	2021-10-21 19:30:38	2021-10-21 19:30:38	t
27	Fort Smith	us.arkansas.fort-smith	51	52	25	2021-10-21 19:30:38	2021-10-21 19:30:38	t
28	Jonesboro	us.arkansas.jonesboro	53	54	25	2021-10-21 19:30:38	2021-10-21 19:30:38	t
29	Little Rock	us.arkansas.little-rock	55	56	25	2021-10-21 19:30:38	2021-10-21 19:30:38	t
25	Arkansas	us.arkansas	48	59	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
30	Texarkana	us.arkansas.texarkana	57	58	25	2021-10-21 19:30:38	2021-10-21 19:30:38	t
32	Bakersfield	us.california.bakersfield	61	62	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
33	Chico	us.california.chico	63	64	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
34	Fresno / Madera	us.california.fresno-madera	65	66	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
35	Gold Country	us.california.gold-country	67	68	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
36	Hanford-Corcoran	us.california.hanford-corcoran	69	70	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
37	Humboldt County	us.california.humboldt-county	71	72	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
38	Inland Empire	us.california.inland-empire	73	74	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
39	Los Angeles	us.california.los-angeles	75	76	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
40	Mendocino County	us.california.mendocino-county	77	78	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
41	Merced	us.california.merced	79	80	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
42	Modesto	us.california.modesto	81	82	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
43	Monterey Bay	us.california.monterey-bay	83	84	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
44	Orange County	us.california.orange-county	85	86	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
45	Palm Springs	us.california.palm-springs	87	88	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
46	Redding	us.california.redding	89	90	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
47	Sacramento	us.california.sacramento	91	92	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
48	San Diego	us.california.san-diego	93	94	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
49	San Francisco Bay Area	us.california.san-francisco-bay-area	95	96	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
50	San Luis Obispo	us.california.san-luis-obispo	97	98	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
51	Santa Barbara	us.california.santa-barbara	99	100	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
52	Santa Maria	us.california.santa-maria	101	102	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
53	Siskiyou County	us.california.siskiyou-county	103	104	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
54	Stockton	us.california.stockton	105	106	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
55	Susanville	us.california.susanville	107	108	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
56	Ventura County	us.california.ventura-county	109	110	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
57	Visalia-Tulare	us.california.visalia-tulare	111	112	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
1	US	us	1	116	\N	2021-10-21 19:30:38	2021-10-21 19:30:38	t
31	California	us.california	60	115	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
58	Yuba-Sutter	us.california.yuba-sutter	113	114	31	2021-10-21 19:30:38	2021-10-21 19:30:38	t
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, name, slug, price, _lft, _rgt, parent_id, created_at, updated_at, usable) FROM stdin;
2	Activities	community.activities	0	2	3	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
3	Artists	community.artists	0	4	5	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
4	Childcare	community.childcare	0	6	7	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
5	Classes	community.classes	0	8	9	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
6	Events	community.events	0	10	11	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
7	General	community.general	0	12	13	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
8	Groups	community.groups	0	14	15	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
9	Local news	community.local-news	0	16	17	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
10	Lost and found	community.lost-and-found	0	18	19	1	2021-10-21 19:30:38	2021-10-21 19:30:38	t
11	Musicians	community.musicians	0	20	21	1	2021-10-21 19:30:39	2021-10-21 19:30:39	t
12	Pets	community.pets	0	22	23	1	2021-10-21 19:30:39	2021-10-21 19:30:39	t
13	Politics	community.politics	0	24	25	1	2021-10-21 19:30:39	2021-10-21 19:30:39	t
14	Rideshare	community.rideshare	0	26	27	1	2021-10-21 19:30:39	2021-10-21 19:30:39	t
1	Community	community	0	1	30	\N	2021-10-21 19:30:38	2021-10-21 19:30:38	t
15	Volunteers	community.volunteers	0	28	29	1	2021-10-21 19:30:39	2021-10-21 19:30:39	t
17	Strictly platonic	personals.strictly-platonic	0	32	33	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
18	Women seeking women	personals.women-seeking-women	0	34	35	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
19	Women seeking men	personals.women-seeking-men	0	36	37	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
20	Men seeking women	personals.men-seeking-women	0	38	39	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
21	Men seeking men	personals.men-seeking-men	0	40	41	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
22	Misc romance	personals.misc-romance	0	42	43	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
23	Casual encounters	personals.casual-encounters	0	44	45	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
24	Missed connections	personals.missed-connections	0	46	47	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
16	Personals	personals	0	31	50	\N	2021-10-21 19:30:39	2021-10-21 19:30:39	t
25	Rants and raves	personals.rants-and-raves	0	48	49	16	2021-10-21 19:30:39	2021-10-21 19:30:39	t
27	Apartments / housing	housing.apartments-housing	0	52	53	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
28	Housing swap	housing.housing-swap	0	54	55	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
29	Housing wanted	housing.housing-wanted	0	56	57	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
30	Office / commercial	housing.office-commercial	0	58	59	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
31	Parking / storage	housing.parking-storage	0	60	61	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
32	Real estate for sale	housing.real-estate-for-sale	0	62	63	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
33	Rooms / shared	housing.rooms-shared	0	64	65	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
34	Rooms wanted	housing.rooms-wanted	0	66	67	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
35	Sublets / temporary	housing.sublets-temporary	0	68	69	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
26	Housing	housing	0	51	72	\N	2021-10-21 19:30:39	2021-10-21 19:30:39	t
36	Vacation rentals	housing.vacation-rentals	0	70	71	26	2021-10-21 19:30:39	2021-10-21 19:30:39	t
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: favoriteables; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.favoriteables (id, user_id, favoriteable_id, favoriteable_type, created_at, updated_at) FROM stdin;
11	1	2	App\\Models\\Listing	2021-10-13 23:00:59	\N
\.


--
-- Data for Name: listings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.listings (id, title, body, user_id, area_id, category_id, live, deleted_at, created_at, updated_at, published_at) FROM stdin;
29	Job Posting	Test	2	3	13	t	\N	2022-03-01 19:18:52	2022-03-01 19:18:59	2022-03-01 19:18:59
23	Hey Hey...	Hey there...	1	3	25	f	\N	2021-10-20 05:15:38	2021-10-20 05:15:38	\N
24	ww	ww	1	3	25	f	\N	2021-10-20 05:17:25	2021-10-20 05:17:25	\N
25	ww	ww	1	3	4	f	\N	2021-10-20 05:17:48	2021-10-20 05:17:48	\N
30	Test	Test	2	3	25	t	\N	2023-12-15 22:12:23	2023-12-15 22:12:34	2023-12-15 22:12:34
22	Brian	Huh?	1	3	4	t	\N	2021-10-20 00:19:55	2021-10-20 00:19:55	2021-10-19 22:41:05
4	test	test lblalshaskasa	1	8	4	f	\N	2021-10-15 18:03:33	2021-10-15 19:05:00	\N
5	Test	Test	1	3	4	f	\N	2021-10-19 15:29:57	2021-10-19 15:29:57	\N
6	Test Again	Test Again	1	3	4	f	\N	2021-10-19 21:18:46	2021-10-19 21:18:46	\N
8	Test 4	Test 4	1	3	4	f	\N	2021-10-19 22:52:51	2021-10-19 22:52:51	\N
12	Test 8	Test 8	1	3	4	f	\N	2021-10-19 23:07:53	2021-10-19 23:07:53	\N
13	Test 8	Test 8	1	3	4	f	\N	2021-10-19 23:09:31	2021-10-19 23:09:31	\N
14	Listing 9	Listing 9	1	3	4	f	\N	2021-10-19 23:12:18	2021-10-19 23:12:18	\N
19	Brian is actually an alien...	Find out where Brian is actually from for $45,000.00	1	3	4	f	\N	2021-10-20 00:11:59	2021-10-20 00:11:59	\N
3	New easel, never used - free.	Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?	1	4	3	t	\N	2021-10-11 22:04:26	2021-10-11 21:25:34	2021-10-19 22:41:05
2	Art supplies to give away	Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?	1	3	3	t	\N	2021-10-11 21:25:34	2021-10-11 21:25:34	2021-10-19 22:41:05
7	Test 3	Test 3	1	3	4	t	\N	2021-10-19 21:20:42	2021-10-19 21:20:42	2021-10-19 22:41:05
9	Test 5	Test 555	1	3	4	t	\N	2021-10-19 22:55:36	2021-10-19 22:55:36	2021-10-19 22:41:05
10	Test 6	Test 6	1	3	4	t	\N	2021-10-19 22:57:17	2021-10-19 22:57:17	2021-10-19 22:41:05
11	Test 7	test 7	1	3	4	t	\N	2021-10-19 23:01:43	2021-10-19 23:01:43	2021-10-19 22:41:05
1	Talented artist needed for new studio	Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?	1	3	3	t	\N	2021-10-11 21:25:34	2021-10-11 21:25:34	2021-10-19 22:41:05
15	Listing 10	Listing 10	1	3	4	t	\N	2021-10-19 23:49:57	2021-10-19 23:49:57	2021-10-19 22:41:05
16	Listing 12	Listing 12	1	3	4	t	\N	2021-10-19 23:50:42	2021-10-19 23:50:42	2021-10-19 22:41:05
17	Listing 22	Listing 22	1	3	4	t	\N	2021-10-19 23:52:59	2021-10-19 23:52:59	2021-10-19 22:41:05
18	Brian is Tireless	Brian is Tireless	1	3	4	t	\N	2021-10-20 00:08:38	2021-10-20 00:08:38	2021-10-19 22:41:05
20	Brian is actually an alien...	Find out where Brian is actually from for $45,000.00	1	3	4	t	\N	2021-10-20 00:12:36	2021-10-20 00:12:36	2021-10-19 22:41:05
21	Brian is Awesome!	What???	1	3	4	t	\N	2021-10-20 00:17:55	2021-10-20 00:17:55	2021-10-19 22:41:05
26	ww	ww	1	3	24	t	\N	2021-10-20 05:18:02	2021-10-20 05:33:52	2021-10-19 22:41:05
27	Hello	Hello aaa	1	3	22	t	\N	2021-10-20 05:34:10	2021-10-20 05:34:19	2021-10-19 22:41:05
28	What up	What up...	1	3	24	t	2021-10-20 07:26:56	2021-10-20 05:35:03	2021-10-20 07:26:56	2021-10-19 22:41:05
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2021_10_10_223100_create_areas_table	2
6	2021_10_12_003038_create_categories_table	3
7	2021_10_12_034500_create_listings_table	4
8	2021_10_12_183511_create_favoriteables_tables	5
9	2021_10_12_231144_create_user_listing_views	6
10	2021_10_14_223252_add_usable_to_areas_table	7
11	2021_10_14_223343_add_usable_to_categories_table	7
12	2021_10_14_223349_add_usable_to_categories_table	8
13	2021_10_20_050732_add_published_at_to_listings_table	9
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: user_listing_views; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_listing_views (id, user_id, listing_id, count, created_at, updated_at) FROM stdin;
3	1	4	1	2021-10-15 18:46:10	2021-10-15 18:46:10
2	1	2	126	2021-10-13 01:33:48	2021-10-19 21:20:29
4	1	7	1	2021-10-19 22:52:17	2021-10-19 22:52:17
6	1	10	1	2021-10-19 22:57:17	2021-10-19 22:57:17
9	1	16	1	2021-10-19 23:50:42	2021-10-19 23:50:42
10	1	17	1	2021-10-19 23:52:59	2021-10-19 23:52:59
12	1	20	1	2021-10-20 00:12:36	2021-10-20 00:12:36
13	1	21	1	2021-10-20 00:17:55	2021-10-20 00:17:55
14	1	22	2	2021-10-20 00:19:55	2021-10-20 05:05:28
15	1	26	1	2021-10-20 05:33:52	2021-10-20 05:33:52
16	1	27	1	2021-10-20 05:34:19	2021-10-20 05:34:19
17	1	28	5	2021-10-20 05:36:01	2021-10-20 07:15:46
8	1	15	2	2021-10-19 23:49:57	2021-10-20 07:41:36
5	1	9	2	2021-10-19 22:55:37	2021-10-20 07:41:47
11	1	18	13	2021-10-20 00:08:38	2021-11-06 14:10:40
7	1	11	3	2021-10-19 23:01:43	2021-11-06 14:11:07
18	2	29	2	2022-03-01 19:18:59	2022-03-01 19:23:03
19	2	30	1	2023-12-15 22:12:34	2023-12-15 22:12:34
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	Gary Herman	gherman@tagleaf.com	\N	$2y$10$jvejmlbzCC9oXjQHovp4POl2bSqFr2Abb2VDbHQGXa9qpjKSA0CuK	\N	2021-10-10 22:16:36	2021-10-10 22:16:36
2	Nick	nick@tagleaf.com	\N	$2y$10$YemwpDibfGuaTuHZr0UaOebAW.ofOVZ1ev4WBVvsijVPEXk7jBb/K	\N	2022-03-01 19:18:07	2022-03-01 19:18:07
\.


--
-- Name: areas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.areas_id_seq', 58, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 36, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: favoriteables_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.favoriteables_id_seq', 11, true);


--
-- Name: listings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.listings_id_seq', 30, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 13, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: user_listing_views_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_listing_views_id_seq', 19, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 2, true);


--
-- Name: areas areas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_pkey PRIMARY KEY (id);


--
-- Name: areas areas_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_slug_unique UNIQUE (slug);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: categories categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_slug_unique UNIQUE (slug);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: favoriteables favoriteables_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoriteables
    ADD CONSTRAINT favoriteables_pkey PRIMARY KEY (id);


--
-- Name: listings listings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.listings
    ADD CONSTRAINT listings_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: user_listing_views user_listing_views_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_listing_views
    ADD CONSTRAINT user_listing_views_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: areas__lft__rgt_parent_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX areas__lft__rgt_parent_id_index ON public.areas USING btree (_lft, _rgt, parent_id);


--
-- Name: categories__lft__rgt_parent_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX categories__lft__rgt_parent_id_index ON public.categories USING btree (_lft, _rgt, parent_id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: favoriteables favoriteables_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoriteables
    ADD CONSTRAINT favoriteables_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: listings listings_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.listings
    ADD CONSTRAINT listings_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: user_listing_views user_listing_views_listing_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_listing_views
    ADD CONSTRAINT user_listing_views_listing_id_foreign FOREIGN KEY (listing_id) REFERENCES public.listings(id);


--
-- Name: user_listing_views user_listing_views_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_listing_views
    ADD CONSTRAINT user_listing_views_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- PostgreSQL database dump complete
--

