<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $division = new Division();
        $division->name = "Korps Brigade Mobil";
        $division->description = "Satuan operasi khusus, pramiliter, dan taktis di Indonesia";
        $division->save();

        $division = new Division();
        $division->name = "Gegana";
        $division->description = "Gegana memiliki kemampuan khusus yang terbagi dalam lima bidang, yaitu intelijen, penjinak bom, anti teror, anti anarkis, dan penanganan KBR (Kimia, Biologi, dan Radioaktif)";
        $division->save();

        $division = new Division();
        $division->name = "Densus 88";
        $division->description = "Timdensus 88 dirancang untuk menjadi unit anti teroris yang bertugas sebagai penyelidik, ahli bahan peledak, dan penembak jitu";
        $division->save();

        $division = new Division();
        $division->name = "SPKT (Sentra Pelayanan Kepolisian Terpadu)";
        $division->description = "SKTP bertugas untuk memberikan pelayanan kepada masyarakat berupa penanganan pengaduan, pelayanan bantuan kepolisian, dan fungsi lain yang terkait dengan identifikasi atau pencegah kejahatan";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Intelkam (Satuan Intelijensi dan Keamanan)";
        $division->description = "Unit ini bertugas membina sistem keamanan termasuk perizinan warga negara asing, kepemilikan senjata api, kegiatan sosial dan politik, serta pembuatan SKCK";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Reskrim (Satuan Reserse Kriminal)";
        $division->description = "Unit ini bertanggung jawab untuk melakukan penyidikan serta identifikasi yang terkait dengan pelanggaran hukum dan tindak pidana";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Resnarkoba (Satuan Reserse Narkoba)";
        $division->description = "Unit ini bertugas melakukan penyidikan tindak pidana berupa penyalahgunaan narkoba, penyuluhan dan pembinaan dalam pencegahan narkoba, serta rehabilitasi korban penyalahgunaan narkoba";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Binmas (Satuan Bina Masyarakat)";
        $division->description = "Unit ini bertugas melakukan pembinaan yang meliputi kegiatan pemberdayaan dan ketertiban masyarakat";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Sabhara (Satuan Samapta Bhayangkara)";
        $division->description = "Sat-Sabhara memiliki tugas untuk mengawasi serta menjaga ketertiban umum dan keamanan di suatu daerah, termasuk melakukan patroli dan bertindak sebagai petugas penegak hukum yang merespon panggilan ke TKP";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Lantas (Satuan Lalu Lintas)";
        $division->description = "Unit ini bertugas untuk penegakan hukum, pengendalian, pengaturan, dan patroli lalu lintas";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Pamobvit (Satuan Pengamanan Obyek Vital)";
        $division->description = "Unit ini melayani kegiatan keamanan VIP dan fasilitas penting seperti pejabat pemerintah, misi diplomatik, kompleks industri, dan kawasan pariwisata";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Polair (Satuan Polisi Perairan)";
        $division->description = "Unit ini bertanggung jawab menjalankan fungsi kepolisian perairan yang meliputi patroli perairan, penagakan hukum perairan, pembinaan masyarakat pesisir, dan pencarian serta pertolongan kecelakaan di wilayah laut";
        $division->save();

        $division = new Division();
        $division->name = "Sat-Tahti (Satuan Tahanan dan Barang Bukti)";
        $division->description = "Unit ini bertugas menyelenggarakan perawatan narapidana meliputi kesehatan tahanan, perwalian narapidana, dan penyimpanan barang bukti di lingkungan Mapolres";
        $division->save();

        $division = new Division();
        $division->name = "Si-Tipol (Seksi Teknologi Informasi Polri)";
        $division->description = "Unit ini bertanggung jawab atas manajemen dan pengembangan sistem komputer dan TI untuk mendukung tugas kepolisian";
        $division->save();

        $division = new Division();
        $division->name = "Si-Propam (Seksi Profesi dan Pengamanan)";
        $division->description = "Unit ini bertanggung jawab untuk melakukan penyelidikan internal terhadap personel polisi yang diduga melakukan tindak pelanggaran dalam penegakkan disiplin, misalnya seperti kasus polisi yang menerima suap";
        $division->save();
    }
}
