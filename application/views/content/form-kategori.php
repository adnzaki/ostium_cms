<form method="post" id="form-kategori" v-if="!showCategoryEdit">
    <label for="nama-kategori">Nama Kategori</label>
    <div class="form-group">
        <div class="form-line">
            <input type="text" name="namaKategori" id="nama-kategori" class="form-control" value="" @keyup="slugGenerator">
        </div>
        <error-msg :msg="errorMsg.nama"></error-msg>
    </div>
    <label for="slug-kategori">Slug</label>
    <div class="form-group">
        <div class="form-line">
            <input type="text" name="slugKategori" id="slug-kategori" class="form-control" value="" @keyup="slugGenerator('slug')">
        </div>
        <small><i>{{ slugDesc }}</i></small>
        <error-msg :msg="errorMsg.slug"></error-msg>
    </div>
    <label for="deskripsi-kategori">Deskripsi</label>
    <div class="form-group">
        <div class="form-line">
            <textarea rows="4" name="deskripsiKategori" id="deskripsi-kategori" class="form-control no-resize" placeholder="Deskripsi kategori..."></textarea>
        </div>
        <error-msg :msg="errorMsg.deskripsi"></error-msg>
    </div>
    <button type="button" class="btn btn-primary waves-effect float" id="tambah-kategori" @click="addCategory">Tambah kategori</button>
</form>

<form method="post" id="edit-kategori" v-else v-for="item in editCategory">
    <label for="nama-kategori">Nama Kategori</label>
    <div class="form-group">
        <div class="form-line">
            <input type="text" name="namaKategori" id="nama-kategori" class="form-control" v-model="item.nama" value="" @keyup="slugGenerator()">
        </div>
        <error-msg :msg="errorMsg.nama"></error-msg>
    </div>
    <label for="slug-kategori">Slug</label>
    <div class="form-group">
        <div class="form-line">
            <input type="text" name="slugKategori" id="slug-kategori" class="form-control" v-model="item.slug" value="" @keyup="slugGenerator('slug')">
        </div>
        <small><i>{{ slugDesc }}</i></small>
        <error-msg :msg="errorMsg.slug"></error-msg>
    </div>
    <label for="deskripsi-kategori">Deskripsi</label>
    <div class="form-group">
        <div class="form-line">
            <textarea rows="4" name="deskripsiKategori" id="deskripsi-kategori" class="form-control no-resize" v-model="item.deskripsi" placeholder="Deskripsi kategori..."></textarea>
        </div>
        <error-msg :msg="errorMsg.deskripsi"></error-msg>
    </div>
    <button type="button" class="btn btn-primary waves-effect float" id="update-kategori" @click="updateCategory(item.id)">Simpan</button>
    <button type="button" class="btn bg-deep-orange waves-effect" id="batal-edit-kategori" @click="reset">Batal</button>
</form>
