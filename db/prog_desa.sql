PGDMP     :    3                z         	   prog_desa    14.1    14.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16968 	   prog_desa    DATABASE     l   CREATE DATABASE prog_desa WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE prog_desa;
                postgres    false            �            1259    16970 	   data_coba    TABLE     �   CREATE TABLE public.data_coba (
    cb_id integer NOT NULL,
    cb_nama character varying(255) NOT NULL,
    cb_almt text NOT NULL,
    cb_nomin numeric(10,0) NOT NULL,
    tgl_datang date NOT NULL
);
    DROP TABLE public.data_coba;
       public         heap    postgres    false            �            1259    16969    data_coba_id_cb_seq    SEQUENCE     �   CREATE SEQUENCE public.data_coba_id_cb_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.data_coba_id_cb_seq;
       public          postgres    false    210            �           0    0    data_coba_id_cb_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.data_coba_id_cb_seq OWNED BY public.data_coba.cb_id;
          public          postgres    false    209            �            1259    17003    dt_user    TABLE     �   CREATE TABLE public.dt_user (
    userid integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at date NOT NULL,
    deleted_at date
);
    DROP TABLE public.dt_user;
       public         heap    postgres    false            �            1259    17002    dt_user_userid_seq    SEQUENCE     �   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    212            �           0    0    dt_user_userid_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.dt_user.userid;
          public          postgres    false    211            a           2604    16973    data_coba cb_id    DEFAULT     r   ALTER TABLE ONLY public.data_coba ALTER COLUMN cb_id SET DEFAULT nextval('public.data_coba_id_cb_seq'::regclass);
 >   ALTER TABLE public.data_coba ALTER COLUMN cb_id DROP DEFAULT;
       public          postgres    false    209    210    210            b           2604    17006    dt_user userid    DEFAULT     p   ALTER TABLE ONLY public.dt_user ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 =   ALTER TABLE public.dt_user ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    211    212    212            �          0    16970 	   data_coba 
   TABLE DATA           R   COPY public.data_coba (cb_id, cb_nama, cb_almt, cb_nomin, tgl_datang) FROM stdin;
    public          postgres    false    210   �       �          0    17003    dt_user 
   TABLE DATA           U   COPY public.dt_user (userid, username, password, created_at, deleted_at) FROM stdin;
    public          postgres    false    212   �       �           0    0    data_coba_id_cb_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.data_coba_id_cb_seq', 1, false);
          public          postgres    false    209            �           0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 1, false);
          public          postgres    false    211            d           2606    16977    data_coba data_coba_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.data_coba
    ADD CONSTRAINT data_coba_pkey PRIMARY KEY (cb_id);
 B   ALTER TABLE ONLY public.data_coba DROP CONSTRAINT data_coba_pkey;
       public            postgres    false    210            f           2606    17010    dt_user dt_user_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.dt_user
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 >   ALTER TABLE ONLY public.dt_user DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    212            �      x������ � �      �   %   x�3�LL��̃���F������1~\1z\\\ ���     