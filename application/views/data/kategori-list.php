<div class="body table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Slug</th>
                <th colspan="2" class="align-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(list, index) in categoryList">
                <td>{{ index + 1 }}</td>
                <td>{{ list.nama_kategori }}</td>
                <td>{{ list.slug_kategori }}</td>
                <td class="align-center pointer" id="btn-edit-kategori" @click="categoryToEdit(list.id_kategori)">
                    <i class="material-icons">mode_edit</i>
                </td>
                <td class="align-center pointer" data-color="red" @click="deleteCategory(list.id_kategori)" id="hapus-kategori">
                    <i class="material-icons">delete</i>
                </td>
            </tr>
        </tbody>
    </table>
</div>
