

CREATE TABLE `parameter` (
  `id_param` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_parameter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_param`, `id_pegawai`, `nama_parameter`) VALUES
(1, 12, 'kimia'),
(2, 11, 'fisika'),
(3, 10, 'bakteri');

INSERT INTO `pegawai` (`id_pegawai`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'amgm', 'amgm','amgm');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuspengecekan`
--

CREATE TABLE `statuspengecekan` (
  `ID` int(11) NOT NULL,
  `id_param` int(11) DEFAULT NULL,
  `HasilPengecekan` enum('Sukses','Tidak Sukses') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_parameter`
--

CREATE TABLE `sub_parameter` (
  `id_sub` int(11) NOT NULL,
  `id_param` int(11) NOT NULL,
  `nama_sub_parameter` varchar(255) NOT NULL,
  `satuan_nilai` varchar(225) NOT NULL,
  `batas_nilai_min` float(10,5) NOT NULL,
  `batas_nilai_max` float(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sub_parameter` (`id_sub`,`id_param`, `nama_sub_parameter`, `satuan_nilai`, `batas_nilai_min`,`batas_nilai_max`) VALUES
(1, 1, 'kimia', 'ml', 10, 20),
(2, 1, 'kimia', 'ml', 10, 20),
(3, 1, 'kimia', 'ml', 10, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_param`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `statuspengecekan`
--
ALTER TABLE `statuspengecekan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_param` (`id_param`);

--
-- Indexes for table `sub_parameter`
--
ALTER TABLE `sub_parameter`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_param` (`id_param`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_param` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuspengecekan`
--
ALTER TABLE `statuspengecekan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_parameter`
--
ALTER TABLE `sub_parameter`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `parameter_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `statuspengecekan`
--
ALTER TABLE `statuspengecekan`
  ADD CONSTRAINT `statuspengecekan_ibfk_1` FOREIGN KEY (`id_param`) REFERENCES `parameter` (`id_param`);

--
-- Constraints for table `sub_parameter`
--
ALTER TABLE `sub_parameter`
  ADD CONSTRAINT `sub_parameter_ibfk_1` FOREIGN KEY (`id_param`) REFERENCES `parameter` (`id_param`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
