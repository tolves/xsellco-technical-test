--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2020-12-07 18:42:33

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
-- TOC entry 202 (class 1259 OID 17120)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 17128)
-- Name: users_admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users_admin (
    id integer NOT NULL,
    user_id integer NOT NULL,
    is_super_admin smallint NOT NULL,
    has_payment_access smallint NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.users_admin OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 17133)
-- Name: users_agent; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users_agent (
    id integer NOT NULL,
    user_id integer NOT NULL,
    has_chat smallint NOT NULL,
    has_ticket_access smallint NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.users_agent OWNER TO postgres;

--
-- TOC entry 2700 (class 2606 OID 17132)
-- Name: users_admin users_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_admin
    ADD CONSTRAINT users_admin_pkey PRIMARY KEY (id);


--
-- TOC entry 2703 (class 2606 OID 17137)
-- Name: users_agent users_agent_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_agent
    ADD CONSTRAINT users_agent_pkey PRIMARY KEY (id);


--
-- TOC entry 2697 (class 2606 OID 17127)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2698 (class 1259 OID 17148)
-- Name: index_users_admin_on_user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX index_users_admin_on_user_id ON public.users_admin USING btree (user_id);


--
-- TOC entry 2701 (class 1259 OID 17149)
-- Name: index_users_agent_on_user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX index_users_agent_on_user_id ON public.users_agent USING btree (user_id);


--
-- TOC entry 2694 (class 1259 OID 17150)
-- Name: index_users_on_email; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX index_users_on_email ON public.users USING btree (email);


--
-- TOC entry 2695 (class 1259 OID 17151)
-- Name: index_users_on_name; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX index_users_on_name ON public.users USING btree (name);


--
-- TOC entry 2704 (class 2606 OID 17138)
-- Name: users_admin fk_user_id_to_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_admin
    ADD CONSTRAINT fk_user_id_to_user FOREIGN KEY (user_id) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 2705 (class 2606 OID 17143)
-- Name: users_agent fk_user_id_to_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_agent
    ADD CONSTRAINT fk_user_id_to_user FOREIGN KEY (user_id) REFERENCES public.users(id) NOT VALID;


-- Completed on 2020-12-07 18:42:33

--
-- PostgreSQL database dump complete
--

