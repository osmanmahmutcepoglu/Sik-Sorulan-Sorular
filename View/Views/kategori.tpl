{include file='header.tpl'}
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Kategori</h1>
                <div class="row">
                    <form action="?rt=Kategori/kategori-ekle" method="POST">
                    <div class="col-lg-2">
                        <label for="kategori-adi">Kategori Adı</label>
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="text" id="kategori-adi" name="kategori_adi">
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" formmethod="post" class="btn btn-primary">Kaydet</button>
                    </div>
                    </form>
                </div>
                <hr/>
                <div class="row">
                    <form action="?rt=Kategori/kategori-sil" method="POST">
                        <div class="col-lg-2">
                            <label for="kategoriler">Kategoriler</label>
                        </div>
                        <div class="col-lg-3">
                            <select class="kategoriler" id="secilen_kategori" name="kategoriler">
                                {foreach $kategori as $k => $v}
                                    <option value="{$v['kategori_id']}">{$v['kategori_adi']}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <button type="submit" id="kategori_sil_btn" formmethod="post" class="btn btn-primary">Sil</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
{include file='footer.tpl'}