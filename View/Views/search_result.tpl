{include file='header.tpl'}

<div class="container">
    <div class="row">
        <ul style="list-style: none;">
            {foreach $arama_sonuc as $sonuc=>$s}
                <a href="http://localhost/SSS/App/?rt=User/dokuman-goruntule&dokuman_id={$s['id']}&secilen_kategori_adi={$s['kategori_adi']}&aranan_deger={$aranan_deger}">
                    <li>
                        <div class="col-lg-12 col-md-12 col-sm-12" style="border: 1px solid lightgrey; margin-bottom: 10px">
                            <h1>{$s['dokuman_basligi']}</h1>
                            <h3>{$s['kategori_adi']}</h3>
                            <i>{$s['dokuman_etiketi']}</i>
                            <strong>{$s['dokuman_tarihi']}</strong>
                        </div>
                    </li>
                </a>
            {/foreach}
        </ul>
    </div>
</div>

{include file='footer.tpl'}
