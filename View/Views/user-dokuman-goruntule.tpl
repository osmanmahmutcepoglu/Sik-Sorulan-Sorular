{include file='header.tpl'}
<div class="container">
    <div class="row" id="icerik">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <h1>{$d['dokuman_basligi']}</h1>
            <h3>{$d['kategori_adi']}</h3>
            <i>{$d['dokuman_etiketi']}</i>
            <strong>{$d['dokuman_tarihi']}</strong>
            <p>{$d['ckeditor']}</p>
        </div>
    </div>
</div>
{include file='footer.tpl'}

<script>
$(document).ready(function (){
    var myParam = location.search.split('aranan_deger=')[1]
    var  context = document.querySelector("#icerik");
    var  instance = new Mark(context);
    instance.mark(myParam);
});
</script>