--
-- PostgreSQL database dump
--

-- Dumped from database version 12.14
-- Dumped by pg_dump version 12.14

-- Started on 2023-04-11 11:07:23

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

--
-- TOC entry 4 (class 2615 OID 18111)
-- Name: website; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA website;


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 308 (class 1259 OID 18124)
-- Name: access; Type: TABLE; Schema: website; Owner: -
--

CREATE TABLE website.access (
    id integer NOT NULL,
    uuid uuid NOT NULL,
    level integer DEFAULT 0 NOT NULL,
    nickname text NOT NULL
);


--
-- TOC entry 307 (class 1259 OID 18122)
-- Name: access_id_seq; Type: SEQUENCE; Schema: website; Owner: -
--

ALTER TABLE website.access ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME website.access_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 309 (class 1259 OID 18129)
-- Name: downloads; Type: TABLE; Schema: website; Owner: -
--

CREATE TABLE website.downloads (
    link text NOT NULL,
    date timestamp with time zone DEFAULT now() NOT NULL,
    provider character varying NOT NULL,
    active boolean DEFAULT true,
    id integer NOT NULL
);


--
-- TOC entry 310 (class 1259 OID 18144)
-- Name: downloads_column1_seq; Type: SEQUENCE; Schema: website; Owner: -
--

ALTER TABLE website.downloads ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME website.downloads_column1_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 306 (class 1259 OID 18114)
-- Name: news; Type: TABLE; Schema: website; Owner: -
--

CREATE TABLE website.news (
    id integer NOT NULL,
    title text NOT NULL,
    body text NOT NULL,
    post_date timestamp with time zone DEFAULT now() NOT NULL,
    posted_by integer NOT NULL,
    active boolean DEFAULT true NOT NULL
);


--
-- TOC entry 305 (class 1259 OID 18112)
-- Name: news_id_seq; Type: SEQUENCE; Schema: website; Owner: -
--

ALTER TABLE website.news ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME website.news_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 3174 (class 0 OID 18124)
-- Dependencies: 308
-- Data for Name: access; Type: TABLE DATA; Schema: website; Owner: -
--

INSERT INTO website.access OVERRIDING SYSTEM VALUE VALUES (1, 'b3b4d400-d41f-4c86-b562-a3cb2917b1d2', 9, 'Ouroboros');


--
-- TOC entry 3175 (class 0 OID 18129)
-- Dependencies: 309
-- Data for Name: downloads; Type: TABLE DATA; Schema: website; Owner: -
--

INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://mega.nz/', '2023-03-27 16:01:01.579566+03', 'MEGA.NZ', false, 1);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('ye', '2023-04-04 13:30:12.817329+03', 'ye', false, 2);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://test.link/test', '2023-04-04 13:32:45.297251+03', 'MEGA.NZ', false, 8);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://test.link/test', '2023-04-04 13:32:38.156616+03', 'MEGA.NZ', false, 7);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://test.link/test', '2023-04-04 13:32:28.049331+03', 'MEGA.NZ', false, 6);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://test.link/test', '2023-04-04 13:31:57.930879+03', 'MEGA.NZ', false, 5);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://test.link/test', '2023-04-04 13:31:37.434538+03', 'MEGA.NZ', false, 4);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('https://test.link/test', '2023-04-04 13:31:21.149338+03', 'MEGA.NZ', false, 3);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('123', '2023-04-11 09:49:27.588793+03', 'test', false, 9);
INSERT INTO website.downloads OVERRIDING SYSTEM VALUE VALUES ('123', '2023-04-11 09:49:31.537048+03', 'test', true, 10);


--
-- TOC entry 3172 (class 0 OID 18114)
-- Dependencies: 306
-- Data for Name: news; Type: TABLE DATA; Schema: website; Owner: -
--

INSERT INTO website.news OVERRIDING SYSTEM VALUE VALUES (6, 'TEST NEWS', 'Hey! This is a <B>TEST</B> news post!

This is space with enter.
<br>This is space using br. <br><br>

Yes, some HTML does work in here. Until we''ll add some beautiful interface for this -- HTML will have to do it! <br><br>

<table class="text-white">
<tr>
<td> Do we like html ? </td>
<td> YES! </td>
</tr>
<tr>
<td>Are we gonna change it?</td>
<td> Hell yeah!</td>
</tr>
</table>', '2023-04-11 11:01:33.446955+03', 1, true);


--
-- TOC entry 3182 (class 0 OID 0)
-- Dependencies: 307
-- Name: access_id_seq; Type: SEQUENCE SET; Schema: website; Owner: -
--

SELECT pg_catalog.setval('website.access_id_seq', 1, true);


--
-- TOC entry 3183 (class 0 OID 0)
-- Dependencies: 310
-- Name: downloads_column1_seq; Type: SEQUENCE SET; Schema: website; Owner: -
--

SELECT pg_catalog.setval('website.downloads_column1_seq', 10, true);


--
-- TOC entry 3184 (class 0 OID 0)
-- Dependencies: 305
-- Name: news_id_seq; Type: SEQUENCE SET; Schema: website; Owner: -
--

SELECT pg_catalog.setval('website.news_id_seq', 6, true);


--
-- TOC entry 3044 (class 1259 OID 18128)
-- Name: access_id_idx; Type: INDEX; Schema: website; Owner: -
--

CREATE UNIQUE INDEX access_id_idx ON website.access USING btree (id);


--
-- TOC entry 3043 (class 1259 OID 18121)
-- Name: news_id_idx; Type: INDEX; Schema: website; Owner: -
--

CREATE UNIQUE INDEX news_id_idx ON website.news USING btree (id);


-- Completed on 2023-04-11 11:07:24

--
-- PostgreSQL database dump complete
--

