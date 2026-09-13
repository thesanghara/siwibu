/**
 * Penyetelan Tailwind untuk BUILD produksi.
 *
 * Kembarannya assets/js/tw-config.js, yang dipakai versi CDN saat pengembangan.
 * Keduanya harus berisi palet yang sama persis — kalau salah satu diubah sendirian,
 * warna di lokal dan di produksi jadi berbeda, dan bedanya baru ketahuan setelah
 * situsnya tayang.
 *
 * Warnanya diambil dari logo siWibu:
 *   #8C1C2F  maroon  — bentuk utama huruf
 *   #B45309  amber   — aksen
 *   #F5F0E8  krem    — bidang terang
 */
module.exports = {
    darkMode: 'class',

    /* Yang dipindai: SELURUH berkas yang bisa memuat nama kelas.
     *
     * Termasuk assets/js: beberapa daftar dibangun lewat innerHTML, dan kelas yang
     * cuma muncul di sana tidak akan pernah ikut kalau yang dipindai hanya PHP —
     * gejalanya kartu hasil pencarian tampil tanpa gaya sama sekali di produksi
     * sementara di lokal terlihat benar, karena CDN menghasilkan kelas sesuai
     * permintaan sedangkan build hanya memuat yang ditemukannya.
     *
     * Direktori ringkas/ dilewati: isinya salinan dari assets/js yang sudah
     * dipindai, dan memindainya dua kali cuma memperlambat build. */
    content: [
        './app/**/*.php',
        './assets/js/*.js',
        './index.php',
    ],

    theme: {
        extend: {
            colors: {
                maroon: {
                    300: '#D9647A',
                    400: '#C13A52',
                    500: '#A82440',
                    600: '#8C1C2F',
                    700: '#6E1425',
                    800: '#52101B',
                    900: '#380B13',
                },
                amber: {
                    300: '#FBBF24',
                    400: '#F59E0B',
                    500: '#D97706',
                    600: '#B45309',
                    700: '#92400E',
                    800: '#78350F',
                },
                krem: '#F5F0E8',
            },
            fontFamily: {
                sans: ['Inter', 'system-ui', 'sans-serif'],
            },
        },
    },

    plugins: [],
};
