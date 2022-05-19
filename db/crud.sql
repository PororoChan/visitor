PGDMP     '    #    
            z            crud    14.1    14.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16968    crud    DATABASE     g   CREATE DATABASE crud WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE crud;
                postgres    false            �            1259    16970 	   msvisitor    TABLE     K  CREATE TABLE public.msvisitor (
    visitorid integer NOT NULL,
    visitorname character varying(255) NOT NULL,
    address text NOT NULL,
    village text NOT NULL,
    rt character varying(5) NOT NULL,
    rw character varying(5) NOT NULL,
    amount numeric(10,0) NOT NULL,
    visitdate date NOT NULL,
    createddate date
);
    DROP TABLE public.msvisitor;
       public         heap    postgres    false            �            1259    16969    data_coba_id_cb_seq    SEQUENCE     �   CREATE SEQUENCE public.data_coba_id_cb_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.data_coba_id_cb_seq;
       public          postgres    false    210            �           0    0    data_coba_id_cb_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.data_coba_id_cb_seq OWNED BY public.msvisitor.visitorid;
          public          postgres    false    209            �            1259    17003    msuser    TABLE     �   CREATE TABLE public.msuser (
    userid integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at date
);
    DROP TABLE public.msuser;
       public         heap    postgres    false            �            1259    17002    dt_user_userid_seq    SEQUENCE     �   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    212            �           0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    211            b           2604    17006    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    211    212    212            a           2604    16973    msvisitor visitorid    DEFAULT     v   ALTER TABLE ONLY public.msvisitor ALTER COLUMN visitorid SET DEFAULT nextval('public.data_coba_id_cb_seq'::regclass);
 B   ALTER TABLE public.msvisitor ALTER COLUMN visitorid DROP DEFAULT;
       public          postgres    false    209    210    210            �          0    17003    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    212   ~       �          0    16970 	   msvisitor 
   TABLE DATA           u   COPY public.msvisitor (visitorid, visitorname, address, village, rt, rw, amount, visitdate, createddate) FROM stdin;
    public          postgres    false    210   �       �           0    0    data_coba_id_cb_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.data_coba_id_cb_seq', 21, true);
          public          postgres    false    209            �           0    0    dt_user_userid_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.dt_user_userid_seq', 6, true);
          public          postgres    false    211            d           2606    16977    msvisitor data_coba_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.msvisitor
    ADD CONSTRAINT data_coba_pkey PRIMARY KEY (visitorid);
 B   ALTER TABLE ONLY public.msvisitor DROP CONSTRAINT data_coba_pkey;
       public            postgres    false    210            f           2606    17010    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    212            �   m   x�3�J�.��WN,)ʬ�W�LL����T1�T14P���*6��-*�Jϵ�.41�4w��JwrI���swK5��52����)�r�s
�4202�50�54����� T�q      �   �   x�U��j�0��z�d�����Z�X-��"�I��q�F߾J(iw��?��M�.O<D{�w��8���ƶ?9r�\]H��I�yT��A��9}����*�
~Zy,<�ݤ��?v7�M�x;���%�;R-�.���d��5������;<�BnB�ǐӄ{�z�T�糔v��ܙ���1�̕3�8ZX�T���I�+�[dYvn�Yc     