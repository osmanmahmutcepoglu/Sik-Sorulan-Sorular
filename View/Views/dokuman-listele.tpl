{include file='header.tpl'}
<div id="page-wrapper" style="right: 0px;bottom: 0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 well" id="content">
                <div class="row">
                    <div class="col-sm-9 col-md-9">
                        <h1 style="max-width: 300px">Dokuman Listele</h1>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <a href="?rt=Dokuman/dokuman-ekle" class="btn btn-primary"
                           style="float: right; margin-top: 30px;">Döküman Ekle</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        {$out}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{include file='footer.tpl'}