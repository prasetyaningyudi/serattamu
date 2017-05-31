insert into tujuan(nama_tujuan) values('Direktur  Sistem Informasi dan Teknologi  Perbendaharaan');
insert into tujuan(nama_tujuan) values('Kasubdit Perancangan dan Pengembangan Sistem Informasi');
insert into tujuan(nama_tujuan) values('Kasubdit Pengelolaan Infrastruktur');
insert into tujuan(nama_tujuan) values('Kasubdit Pengelolaan Sistem Informasi Eksternal');
insert into tujuan(nama_tujuan) values('Kasubdit Pengelolaan Transformasi Teknologi Informasi');
insert into tujuan(nama_tujuan) values('Kasubdit Pengelolaan Sistem Informasi Internal');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Perangkat Keras');
insert into tujuan(nama_tujuan) values('Seksi Dukungan Teknis dan Pengendalian Mutu Aplikasi');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan dan Analisis Basis Data');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Jaringan dan Komunikasi Data');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Sistem Informasi Eksternal I');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Sistem Informasi Eksternal II');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Sistem Informasi Eksternal III');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Sistem Informasi Internal II');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Sistem Informasi Internal III');
insert into tujuan(nama_tujuan) values('Seksi Pengembangan Aplikasi I');
insert into tujuan(nama_tujuan) values('seksi Pengembangan Aplikasi II');
insert into tujuan(nama_tujuan) values('Seksi Perencanaan dan Analisis Sistem Aplikasi');
insert into tujuan(nama_tujuan) values('Seksi Perencanaan dan Transformasi Teknologi Informasi');
insert into tujuan(nama_tujuan) values('Kasubbag Tata Usaha');
insert into tujuan(nama_tujuan) values('Seksi Layanan Pengguna');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Data Referensi dan Pengguna Sistem');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Kinerja Transformasi Teknologi Informasi');
insert into tujuan(nama_tujuan) values('Seksi Pengelolaan Perangkat Lunak');
insert into tujuan(nama_tujuan) values('Seksi Publikasi dan Komunikasi Sistem Informasi');


insert into role(nama_role) values('Administrator');
insert into role(nama_role) values('Supervisor');
insert into role(nama_role) values('Operator');

insert into user(username, password, nama_user, role_id, status_user) values('YudiPrasetyo', 'e19d5cd5af0378da05f63f891c7467af', 'Yudi Prasetyo', '1', '1');
insert into user(username, password, nama_user, role_id, status_user) values('HafidzAdnan', 'e19d5cd5af0378da05f63f891c7467af', 'Hafidz Adnan', '2', '1');
insert into user(username, password, nama_user, role_id, status_user) values('Operator1', 'e19d5cd5af0378da05f63f891c7467af', 'Sumiyati Ningtiyas', '3', '1');

insert into instansi(nama_instansi) values('Direktorat Sistem Perbendaharaan');
insert into instansi(nama_instansi) values('Direktorat Sistem Manajemen Investasi');
insert into instansi(nama_instansi) values('Direktorat Pelaksanaan Anggaran');
insert into instansi(nama_instansi) values('JNE');

insert into pegawai(nip, nama_pegawai, jabatan, status_pegawai) values
("196904091989121000","DR. Sudarto, S.E., M.B.A, Ph.D","Direktur  Sistem Informasi dan Teknologi  Perbendaharaan","1"),
("196504071985031000","Syarwan, SE, MM","Kasubdit Perancangan dan Pengembangan Sistem Informasi","1"),
("196107111984031000","Suharman, S.Kom, MM","Kepala Sub Direktorat Pengelolaan Infrastruktur","1"),
("197507061999031000","Moch. Ali Hanafiah, S.Kom, M.Sc","Kepala Sub Direktorat Pengelolaan Sistem Informasi Eksternal","1"),
("197205171999031000","Eko Sulistijo, S.H., M.T.","Kepala Sub Direktorat Pengelolaan Transformasi Teknologi Informasi","1"),
("197503032002121000","Achmad Rinaldi Hidayat, S.Kom,MMSI, M.Com","Kepala Subdit Pengelolaan Sistem Informasi Internal","1"),
("197206151998031000","Tri Widiyono, S.Kom","Kepala Seksi Pengelolaan Perangkat Keras","1"),
("197901122002121000","Yohanes Probo satrio, S.Kom,M.B.I.S","Kepala Seksi Dukungan Teknis dan Pengendalian Mutu Aplikasi","1"),
("197508021995021000","Yusuf Nurrohman, Ak.M.Sc,MBA","Kepala Seksi Pengelolaan dan Analisis Basis Data","1"),
("197508142002121000","Andrian Rendra Lesmana, S.Kom, M.Com","Kepala Seksi Pengelolaan Jaringan dan Komunikasi Data","1"),
("197705152002121000","Yudhistira Kesuma, S.Kom, MBA","Kepala Seksi Pengelolaan Sistem Informasi Eksternal I","1"),
("197701231996032000","Ingelia Puspita, S.E.,M.Com.","Kepala Seksi Pengelolaan Sistem Informasi Eksternal II","1"),
("197605021996031000","Agung Triyanto Joko Marsono,SST,Sk, M.M","Kepala Seksi Pengelolaan Sistem Informasi Eksternal III","1"),
("196401261985031000","Ir. Urip Burhan","Kepala Seksi Pengelolaan Sistem Informasi Internal II","1"),
("197608091996021000","Adi Setiawan, S.E.,SST.,AK.,MPPM","Kepala Seksi Pengelolaan Sistem Informasi Internal III","1"),
("196405061985031000","Alwi, SE, MM","Kepala Seksi Pengembangan Aplikasi I","1"),
("197005121990121000","Siswanto, S.Sos, MM","Kepala seksi Pengembangan Aplikasi II","1"),
("197503211995021000","Muhammad Syaifuddin Luthfi, Sst, Ak","Kepala Seksi Perencanaan dan Analisis Sistem Aplikasi","1"),
("197306071993011000","Mohammad Sidkon, SE, MIB","Kepala Seksi Perencanaan dan Transformasi Teknologi Informasi","1"),
("197712112002121000","Iman Santosa, SS, M.Si","Kepala Subbag Tata Usaha","1"),
("197907242000011000","Nugroho Juli Purnama, SE, MM (Hr)","Kepala Seksi Layanan Pengguna","1"),
("197910202001121000","Yusuf Abdin Bakhtiar, SE, MT","Kepala Seksi Pengelolaan Data Referensi dan Pengguna Sistem","1"),
("197409011995111000","Tatas Yogas Baktilugina, S.Sos, M. Com","Kepala Seksi Pengelolaan Kinerja Transformasi Teknologi Informasi","1"),
("196812141990121000","Imam Hartawan, SE, MM","Kepala Seksi Pengelolaan Perangkat Lunak","1"),
("197305291993011000","Sulistiyono, SE, ME","Kepala Seksi Publikasi dan Komunikasi Sistem Informasi","1"),
("196012141985032000","Mikawati, SE","Pelaksana","1"),
("196107011982092000","Olopan Nainggolan, SE","Pelaksana","1"),
("197711172002122000","Rusdiana, S.Kom, M.Kom","Pelaksana","1"),
("195910111984021000","Ranto Pakpahan, S.SOS","Pelaksana","1"),
("196001261989031000","Mustafa Camal Pasha","Pelaksana","1"),
("196211181984031000","M. Nasir, S.IP","Pelaksana","1"),
("196308111984022000","Sri Daliati","Pelaksana","1"),
("197409031994022000","Etika Wijayaningrum, SE,MBA","Pelaksana","1"),
("198101142001122000","Tika Danti Isnurini, SST,Ak,MBA","Pelaksana","1"),
("198204032010121000","Martinus Hanung Setyawan, SE, M.Si","Pelaksana","1"),
("198402022004121000","Faried Zamachsari, SE","Pranata Komputer Muda","1"),
("196009221982032000","Damar Mintasih","Pelaksana","1"),
("196010201982032000","Surtinah","Pelaksana","1"),
("196205141983031000","Sugeng Riyadi","Pelaksana","1"),
("196602261994021000","Nahwani","Pelaksana","1"),
("197004101999031000","Muhammad Hadi Wijaya, SE","Pelaksana","1"),
("197305141994031000","Ivan Setiawan","Pelaksana","1"),
("197402151996021000","Kholid Harisfauzi","Pelaksana","1"),
("197506171996021000","Imam Budi Suharyo","Pelaksana","1"),
("197608171999031000","Agus Rosidi, SE","Pelaksana","1"),
("197704171999031000","Cahyo Nugroho, SST, Ak","Pelaksana","1"),
("197708251999031000","Budi Prasetyo, SE","Pelaksana","1"),
("198006262001121000","Adhitya Sukma Permana, SE","Pelaksana","1"),
("198103062004121000","Wisnu Ariadin, SE","Pelaksana","1"),
("198105232002121000","Fajrialshah Amarul Haq, SE","Pelaksana","1"),
("198106132003121000","Haris Roseno, SST","Pelaksana","1"),
("198201212009012000","Dieny Sukmiati, S.Kom, M.Kom","Pelaksana","1"),
("198202222004121000","Prodho Praharanto, SE","Pelaksana","1"),
("198205022003121000","Parno, SST, Ak","Pelaksana","1"),
("198207212004121000","Hafez Aditya, SE","Pelaksana","1"),
("198212052004121000","Teguh Dwi Prasetyo, SE","Pelaksana","1"),
("198212052004121001","Supyan Setiyo Budi, SE","Pelaksana","1"),
("198307292004121000","Agus Hendartono, SST","Pelaksana","1"),
("198310132004121000","Siswo Nugroho, SE","Pelaksana","1"),
("198402272006021000","Bonnie Permana Negara, SE","Pelaksana","1"),
("198403112004121000","Pandu Yudha Prawira,S.Kom","Pelaksana","1"),
("198403202009011000","Risvan Ardiansyah, S.KOM","Pelaksana","1"),
("198407232006021000","Irwan Tri Wahyudi, SST","Pelaksana","1"),
("198409012009012000","Mawarwati Hariyono Putri, SE","Pelaksana","1"),
("198410252006021000","Suryo Sujoko, S.Kom","Pelaksana","1"),
("198705192010122000","Prima Rahmita Ariftyanie , SE","Pelaksana","1"),
("198707172010121000","Muhammad Ilman Anwar, S.Kom","Pelaksana","1"),
("198211012004121000","Undip Yutoto Adi Nugroho, S, Kom","Pranata Komputer","1"),
("197706301999031000","Andika Bangun Patria","Pranata Komputer Pertama","1"),
("197803112000011000","Ali Nasrun, S. Kom","Pranata Komputer Pertama","1"),
("198004092001121000","Umar Jati, SST, Ak","Pranata Komputer Pertama","1"),
("198310302004121000","Satwiko Adhiwidyo, SE","Pranata Komputer Pertama","1"),
("198312142010121000","Bayu Yudistira, M.Eng","Pranata Komputer Pertama","1"),
("197806281999031000","Daryono, SE","Pelaksana","1"),
("198202062004121000","Muhammad Luthfiy Kurniawan Harsono , SE","Pelaksana","1"),
("198207292001121000","Fitria Yulianto, S.Kom","Pelaksana","1"),
("198303022006021000","Mustaqim Siga, S.Kom","Pelaksana","1"),
("198304192004121000","Jafar Ismail","Pelaksana","1"),
("198306152006021000","I Putu Danny Hadi Kusuma, SE","Pelaksana","1"),
("198308082006021000","Ari Wibowo, S.Kom","Pelaksana","1"),
("198308092002121000","Pungkas Abet Pramono, SE","Pelaksana","1"),
("198310212004121000","Daniel Sianturi, S.Kom","Pelaksana","1"),
("198311222004121000","Hanung Adi Wijaya","Pelaksana","1"),
("198402282003122000","Ernestina Rahmanasari, S.Kom","Pelaksana","1"),
("198403042004121000","Aditya Nugraha, SE","Pelaksana","1"),
("198404162006021000","M. Wahid Hasyim, S. Kom","Pelaksana","1"),
("198404162006021001","Candra Dwi Aprida, S.Kom","Pelaksana","1"),
("198404282006021000","Harpananda Eka Sarwadhamana,S.Kom ","Pelaksana","1"),
("198405132007101000","Ahmad Rivai","Pelaksana","1"),
("198408182006021000","Aries Munandar, SE","Pelaksana","1"),
("198410262007101000","Yudi Prasetyo, S. Kom","Pelaksana","1"),
("198411012006021000","Yudhistira","Pelaksana","1"),
("198507062007101000","Mukhamad Hafidz Basirulloh Adnan","Pelaksana","1"),
("198507182007101000","Eko Sigitpurnomo, S.Kom","Pelaksana","1"),
("198508142007101000","Agastya Vitadhani, S.Kom","Pelaksana","1"),
("198508242006021000","Muhammad Jihad, S.Kom","Pelaksana","1"),
("198510252006021000","Gahara Dijerja, SE","Pelaksana","1"),
("198710102012121000","Dedik Erwanto, SE","Pelaksana","1"),
("198310132002121000","Muhammad Husni Thamrin","Pranata Komputer Pelaksana","1"),
("198208302001121000","Johan Muslim","Pranata Komputer Pelaksana Lanjutan","1"),
("198305162004121000","Achmad Ford, SE","Pranata Komputer Pelaksana Lanjutan","1"),
("198205202004121000","Margo Utomo, S. Kom","Pranata Komputer Pertama","1"),
("198211152003121000","Mohamad Komara Novianto, S. Kom","Pranata Komputer Pertama","1"),
("198302172004121000","Miftah Muhammad Wazni, SE","Pranata Komputer Pertama","1"),
("198302192004121000","Dhika Harlian Utama, S. Kom","Pranata Komputer Pertama","1"),
("198302212004121000","Batista Vebriarta, S.Kom","Pranata Komputer Pertama","1"),
("198304222004121000","Andy Haholongan, SE","Pranata Komputer Pertama","1"),
("198304302004121000","Aprilian Salisa, SE","Pranata Komputer Pertama","1"),
("198309152004121000","Moh. Ardan Wajidi, S. Kom","Pranata Komputer Pertama","1"),
("198403112006021000","Yusuf Bakhtiyar, SE","Pranata Komputer Pertama","1"),
("198411262007101000","Yoga Arief Priswanto, S. Kom","Pranata Komputer Pertama","1"),
("198411272006021000","Novan Andre Valen, S. Kom","Pranata Komputer Pertama","1"),
("198509112007101000","Andi Saputra, S.Kom","Pranata Komputer Pertama","1"),
("198608142006021000","Moh. Arie Hasan","Pranata Komputer Pertama","1"),
("198703102006021000","Parno","Pranata Komputer Pelaksana","1"),
("196201051985031000","Ibrahim","Pelaksana","1"),
("197710072001121000","Widya Edu Nugroho","Pelaksana","1"),
("198109042001121000","Bambang Sugiarto","Pelaksana","1"),
("198206272002121000","Teguh Setiya Sedayu","Pelaksana","1"),
("198210142001121000","Danang Kurniawan","Pelaksana","1"),
("198210212001121000","Raden Soepriadi","Pelaksana","1"),
("198211072002121000","Rio Hermawanto, SE","Pelaksana","1"),
("198302072002121000","Feri Susilo Gagal Rencana","Pelaksana","1"),
("198304242002121000","Fahmy Chairil Ridho","Pelaksana","1"),
("198305252002121000","Moh. Himam Iqbal","Pelaksana","1"),
("198305262002121000","Agus Priyono","Pelaksana","1"),
("198307032002121000","Yuli Setyo Budi","Pelaksana","1"),
("198308202002121000","Hendi Hendaris","Pelaksana","1"),
("198308282002121000","Agus Santoso","Pelaksana","1"),
("198404182003121000","Eko Saputro","Pelaksana","1"),
("198407092003121000","Ari Rohmawan","Pelaksana","1"),
("199002082010121000","Gilang Fajar Febrian, A.Md","Pelaksana","1"),
("198109252002121000","Rifan Abdul Rachman, SE","Pranata Komputer Pelaksana","1"),
("198508252006021000","Efid Dwi Agustono","Pranata Komputer Pelaksana","1"),
("197201241999031000","Priyanto","Pelaksana","1"),
("198201152002121000","Jananto Sigit Widodo","Pelaksana","1"),
("198301242003121000","Pujo Hardono","Pelaksana","1"),
("198303272003121000","Slamet Hidayat","Pelaksana","1"),
("198306202003121000","Rudiyanto","Pelaksana","1"),
("198307162003121000","Aditio Pra Utama","Pelaksana","1"),
("198310082003121000","Maryanto","Pelaksana","1"),
("198310192003121000","Erys Al Fauzi Minhando","Pelaksana","1"),
("198311152003121000","Joko Hartanto","Pelaksana","1"),
("198312102003121000","Agus Ilhami, SE","Pelaksana","1"),
("198312172003121000","Hendra Adi Saputra","Pelaksana","1"),
("198402032003121000","Edi Prayitno, SE","Pelaksana","1"),
("198404282006021001","Agung Khoirul Anam","Pelaksana","1"),
("198406192003121000","Kukuh Susilo Utomo","Pelaksana","1"),
("198406302003121000","Aris Setiyawan","Pelaksana","1"),
("198410242003121000","Ahmad Taufiq Gultom ","Pelaksana","1"),
("198411102003121000","Mh. Solikin Setianto","Pelaksana","1"),
("198504272006021000","Husaini, SE, SH","Pelaksana","1"),
("198506082006021000","Jeny Serhan","Pelaksana","1"),
("198508232006021000","M. Iqbal Anshori","Pelaksana","1"),
("198603092006021000","Rahmat Hidayat","Pelaksana","1"),
("198609162006021000","Hermawan Effendi","Pelaksana","1"),
("198703182006021000","Barthi Dasan","Pelaksana","1"),
("198705222007101000","Benitriadi Meidy Meniung ","Pelaksana","1"),
("198809182012101000","M. Mal'an Rizki, A.Md","Pelaksana","1"),
("198905212012101000","Muhammad Nawawy Arasy P, A.Md ","Pelaksana","1"),
("198908012013101000","Rahadian Zahri Irwansyah, A.Md ","Pelaksana","1"),
("199001032012101000","Hashemi Januarsyah, A.Md","Pelaksana","1"),
("199003032013101000","Wahyu Ragil Saputro, A.Md     ","Pelaksana","1"),
("199003192012101000","Lathiful Alamsyah, A.Md","Pelaksana","1"),
("199003272014111000","Rakhmat Hidayat, A.Md ","Pelaksana","1"),
("199003302012101000","Muhammad Fithrah, A.Md","Pelaksana","1"),
("199005192012101000","Lutfi Hakim, A.Md","Pelaksana","1"),
("199006152012102000","Wening Puspitasari, A.Md","Pelaksana","1"),
("199006172012101000","Garda Yaumil Akhir, A.Md ","Pelaksana","1"),
("199008262012101000","Astu Adi Laksana, A.Md","Pelaksana","1"),
("199102082013101000","Tri Asmeli, A.Md","Pelaksana","1"),
("199102112012101000","Sukmawan Wachida, A.Md ","Pelaksana","1"),
("199104032012101000","Yusup Setiawan, A. Md","Pelaksana","1"),
("199107142012101000","Alifiyan Rosyidi, A.Md","Pelaksana","1"),
("199108082013101000","Sonatha Marsaor Tua Tambunan, A.Md ","Pelaksana","1"),
("199203082014111000","Muhamad Geby Ramadan Roring, A.Md ","Pelaksana","1"),
("199204092014111000","Nur Fitra Aprilian Dian Pamarna, A.Md ","Pelaksana","1"),
("199205252014112000","Mila Karina, A.Md","Pelaksana","1"),
("199207032014111000","Muhammad Aditya Bakry, A.Md ","Pelaksana","1"),
("199207082014111000","Adi Nugroho,A.Md","Pelaksana","1"),
("199208192014111000","Rakhmat Jati Waluyo, A.Md ","Pelaksana","1"),
("199211152014111000","M. Firdausa Hizby Islami, A.Md ","Pelaksana","1"),
("199211202014111000","M. Harviandi Rachman, A.Md ","Pelaksana","1"),
("199301262014112000","Ghitha Afifah Hurin, A.Md ","Pelaksana","1"),
("198204172001121000","Muji Arianto, SE","Pranata Komputer Pertama","1"),
("198312132003121000","Edi Witono","Pranata Komputer Pelaksana","1"),
("198505312006021000","Vina Ariyandi","Pranata Komputer Pelaksana","1"),
("198607012006021000","Eko Firmansyah","Pranata Komputer Pelaksana","1");
