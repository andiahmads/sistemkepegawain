export default class Gate {

    constructor(user)
    {
        this.user = user;
    }

    isAdmin()
    {
        return this.user.type === 'admin';
    }

    isPimpinan()
    {
        return this.user.type === 'pimpinan';
    }

    isAdminOrPimpinan()
    {
        if (this.user.type === 'admin' || this.user.type === 'pimpinan' ){
            return true;
        }


    }
    isAdminOrPegawai()
    {
        if (this.user.type === 'admin' || this.user.type === 'pegawai' ){
            return true;
        }


    }

    isPimpinanOrPegawai()
    {
        if (this.user.type === 'pimpinan' || this.user.type === 'pegawai' ){
            return true;
        }


    }

    
}