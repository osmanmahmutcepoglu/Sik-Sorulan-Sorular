{include file='header.tpl'}
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <h1>Döküman Ekle</h1>
                <form action="?rt=Dokuman/dokuman-ekle" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-basligi">Döküman Başlığı</label></div>
                            <div>
                                <input class="form-control" type="text" id="dokuman-basligi" name="dokuman_basligi">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <labeL for="kategori-adi">Döküman Kategorisi</labeL>
                            </div>
                            <div>
                                <select class="kategori-ekle form-control" name="kategori_adi">
                                    {foreach $kategori as $k => $v}
                                        <option value="{$v['kategori_adi']}">{$v['kategori_adi']}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman_etiketi">Döküman Etiketi</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="dokuman_etiketi" id="dokuman_etiketi"  value="" data-role="tagsinput"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="dokuman-durum">Döküman Durumu</label>
                            </div>
                            <div>
                                <select class="dokuman-durum form-control" name="dokuman_durum">
                                    <option value="aktif">Aktif</option>
                                    <option value="pasif">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:50px;">
                        <div class="col-lg-12">
                            <label for="ckeditor1" style="font-size: 25px;">Döküman İçeriği</label>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="ckeditor" name="ckeditor" id="ckeditor1"></textarea>
                        </div>
                    </div>

                <div class="row" style="float: right; margin-right: 50px; margin-top: 10px;">
                    <button type="submit" formmethod="post" class="btn btn-primary">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
{include file='footer.tpl'}