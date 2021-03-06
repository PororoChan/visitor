PGDMP         1                z            crud    14.1    14.1     ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    17145    crud    DATABASE     g   CREATE DATABASE crud WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE crud;
                postgres    false            ?            1259    17146    msuser    TABLE     ?   CREATE TABLE public.msuser (
    userid integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp without time zone
);
    DROP TABLE public.msuser;
       public         heap    postgres    false            ?            1259    17151    dt_user_userid_seq    SEQUENCE     ?   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    209            ?           0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    210            ?            1259    17152 	   msvisitor    TABLE     I  CREATE TABLE public.msvisitor (
    visitorid integer NOT NULL,
    visitorname character varying(255) NOT NULL,
    address text NOT NULL,
    village text NOT NULL,
    rt character varying(5) NOT NULL,
    rw character varying(5) NOT NULL,
    amount bigint,
    visitdate date,
    createddate timestamp without time zone
);
    DROP TABLE public.msvisitor;
       public         heap    postgres    false            ?            1259    17157    msvisitor_visitorid_seq    SEQUENCE     ?   CREATE SEQUENCE public.msvisitor_visitorid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.msvisitor_visitorid_seq;
       public          postgres    false    211            ?           0    0    msvisitor_visitorid_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.msvisitor_visitorid_seq OWNED BY public.msvisitor.visitorid;
          public          postgres    false    212            a           2604    17158    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209            b           2604    17159    msvisitor visitorid    DEFAULT     z   ALTER TABLE ONLY public.msvisitor ALTER COLUMN visitorid SET DEFAULT nextval('public.msvisitor_visitorid_seq'::regclass);
 B   ALTER TABLE public.msvisitor ALTER COLUMN visitorid DROP DEFAULT;
       public          postgres    false    212    211            ?          0    17146    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   ?       ?          0    17152 	   msvisitor 
   TABLE DATA           u   COPY public.msvisitor (visitorid, visitorname, address, village, rt, rw, amount, visitdate, createddate) FROM stdin;
    public          postgres    false    211   o       ?           0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210            ?           0    0    msvisitor_visitorid_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.msvisitor_visitorid_seq', 6, true);
          public          postgres    false    212            d           2606    17161    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            f           2606    17163    msvisitor msvisitor_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.msvisitor
    ADD CONSTRAINT msvisitor_pkey PRIMARY KEY (visitorid);
 B   ALTER TABLE ONLY public.msvisitor DROP CONSTRAINT msvisitor_pkey;
       public            postgres    false    211            ?   ?   x?Uͻ?0@??}
V??/*??(?P5.???D??kL\Nr??1d?.???j?4F?j???F?rI?}v?`????? ???????????V;??u???@@????`??ۖN1?Sy?Q\?L?H~6g?V]?0{????l???3?N????Z?ߑa<Ѹ???OE?R?Y-K7-n???N?;?      ?   ?   x?}бn?0???y???!;??.[խH?SY?X*?@?? C߾???g/?>?2?M??o?$x?E?.!J??U"?vaP@$ <:wB>9?;KK???Μᵟ??6e?ɛ:J??4?(?䰃x~n??b?lJ?hǹ?]r?у]?6?#?֒??勉>$W@???h?=?=??A#SlG=zm?RwOޞ??L??pG?W?|Ƙ_ѳV?     