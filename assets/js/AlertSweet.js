const flashdata = $('.flash-data').data('flashdata');
//LOGIN berhasil
if (flashdata == 'Login berhasil') {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: flashdata,
        showConfirmButton: false,
        timer: 2000
    })
}

//LOGIN gagal (user belum terdaftar)
if (flashdata == 'User belum terdaftar') {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Login Tidak berhasil',
        text: 'User belum terdaftar',
        showConfirmButton: true,
    })
}

//LOGIN gagal (Password Salah)
if (flashdata == 'Password Salah !') {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Login Tidak berhasil',
        text: 'Password Salah !',
        showConfirmButton: true,
    })
}

//LOGIN gagal (Field tidakk boleh kosong)
if (flashdata == 'Tidak boleh kosong !') {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Login Tidak berhasil',
        text: 'Password Salah !',
        showConfirmButton: true,
    })
}

//Pendaftaran Berhasil
if (flashdata == 'Pendaftaran Sukses !') {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: flashdata,
        text: 'Silahkan lakukan login',
        showConfirmButton: false,
        timer: 2000
    })
}