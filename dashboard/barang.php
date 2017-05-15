<br/>

<div class="ui menu square">
  <div class="item header">
    Barang
  </div>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List Barang</div>
    <table class="ui stackable structured table">
        <thead>
          <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Deskripsi Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Created at</th>
            <th colspan="2">Edit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Contoh</td>
            <td>Contoh</td>
            <td>Contoh</td>
            <td>Contoh</td>
            <td>Date</td>
            <td><input class="ui basic button" value="Edit"></td>
            <td><input class="ui basic red button" value="Delete"></td>
          </tr>
        </tbody>
    </table>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">Tambah Barang</div>
    <form class="ui form">
        <div class="field">
            <label>Nama Barang</label>
            <input type="text" name="product-name" placeholder="Nama Barang">
        </div>
        <div class="field">
            <label>Deskripsi Barang</label>
            <textarea type="text" name="product-description"></textarea>
        </div>
        <div class="field">
            <label>Stok Barang</label>
            <input type="number" name="product-stock" placeholder="Stok Barang">
        </div>
        <div class="field">
            <label>Harga Barang</label>
            <div class="ui labeled input">
                <div class="ui label">Rp</div>
                <input type="number" name="product-price" placeholder="Harga Barang">
            </div>
        </div>
        <input class="ui primary button" name="add-product" type="submit" value="Tambah Barang">
    </form>
</div>