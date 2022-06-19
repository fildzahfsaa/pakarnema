<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <p class="card-title">Tambah Data Pakar</p>
                    <div class="row">
                    <div class="col-12">
                        <form class="forms-sample" action="" method="post">
                            <input type="hidden" name="id_user" value="<?= $pakar['id_user']; ?>">
                            <div class="form-group">
                                <label for="nama_user">Nama Pakar</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $pakar['nama_user']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $pakar['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?= $pakar['password']; ?>">
                            </div>      
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="level" name="level" value="<?= $pakar['level']; ?>">
                            </div>    
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>