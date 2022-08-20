<?php


namespace app;


class Web
{
    function paging_control($base_url, $total_records, $page_size, $current_page)
    {
        $url = $base_url;
        if (@$_REQUEST["sort"]) {
            $url .= "&sort=" . $_REQUEST["sort"];
        }
        if (@$_REQUEST["keywords"]) {
            $url .= "&keywords=" . $_REQUEST["keywords"];
        }

        $pages = ceil($total_records / $page_size);
        $pager = "";

        for ($i = 1; $i <= $pages; $i++) {
            if ($current_page == $i) {
                $pager .= "&nbsp;&nbsp;$i&nbsp;&nbsp;";
            } else {
                $url .= "&pg=$i";
                $pager .= "<a href='$url'>&nbsp;$i&nbsp;</a>";
            }
        }

        return $pager;
    }

    function message($message)
    {
        echo "<script language='javascript'>
			alert('$message');
		</script>";
    }

    function return_to_page($page)
    {
        echo "<script language='javascript'>window.location.href='$page'
			</script>";
    }

    public static function createcountrycombo($CSelectedValue = "")
    {
        $stCountry = "Afganistan:Albani:Algier:Andorra:Angola:Anguilla:Antigua:Antilles:Arabia:Argentina:Armenia:Aruba:Ascension:Australia:Austria:Bahrain:Bangladesh:Barbados:Belarus:Belgium:Belize:Benin:Bermuda:Bhutan:Bolivia:Botsuana:Brasil:Brunei:Bulgaria:Burkina Faso:Burundi:CANADA:Canal Islands:Caymay Islands:Chile:China:Columbia:Cook Islands:Costa Rica:Cote d lvoire:Cuba:Cyprus:Czech Republic:Denmark:Dominica:Dschibuti:Ecuador:Egypt:EL Salvador:Equadorguinea:Eritrea:Estland:Ethiopia:Falkland Islands:Fiji Islands:Finland:France:French Guayana:French Polynesia:Faroer:Gubun:Gambin:Georgien:Germany:Ghana:Gibraltar:Great Britain:Greece:Greenland:Grenanda:Guadeloupa:Guam:Guatemala:Guinea:Guinea-Bissau:Guyana:Haiti:Hondura:Hongkong:Hungary:Iceland:India:Indonesia:Irak:Iran:Ireland:Israel:Italy:Jamica:Japan:Jordan:Jugoslavia:Kambodscha:Kamerun:Kap Verda:Kasachstan:Katar:Kenia:Kirgisistan:Kiribati:Kongo:Korea:Kroatia:Kuwait:Laos:Latvia:Lebanon:Lesotho:Liechtenstein:Lethuania:Luxembourg:Lyberia:Lybia:Macau:Madagaskar:Malawi:Malaysia:Maldieves:Mali:Malta:Man Island:Mariana:Marshall Islands:Martinique:Mauretania:Mauritius:Mayotte:Maxedonia:Mexico:Mikronesia:Maldau Republic:Monaco:Mongolia:Montserral:Morocco:Mosambique:Myanmar:Namibia:Nauru:Nepal:Netherlands:New Zealand:Newkaledonia:Nicaragua:Niger:Nigeria:North Ireland:Norway:Oman:Palau:Panama:Papua:Paraguay:Peru:Peru:Poland:Portugal:Puerto Rico:Reunion:Ruanda:Rumania:Russia:Salomones:Sambia:Samoa:Samoa(US):San Marino:Sao Tome:Saudi Arabia:Senegal:Seychelles:Seychelles:Zimbabwe:Singapore:Slovakia:Slovenia:Somalia:South Africa:Spain:Sri Lanka:St.Helena:St.Kitts:St.Lucia:St.Pierre:St.Vincent:Sudan:Suriname:Swaziland:Sweden:Switzerland:Syria:Tazikistan:Taiwan:Tansania:Thailand:Togo:Tongo:Trinibad:Tschad:Tunesia:Turkey:Turkmenistan:Uganda:Ukraina:USA:Uruguay:Usbekistan:Vanuatu:Vatican City:Venezuela:Vietnam:Virgin Island(GB):Yemen:Zaire:Bahamas:Pakistan";
        $stCountry = explode(":", $stCountry);
        for ($i = 0; $i < sizeof($stCountry); $i++) {
            if ($CSelectedValue == $stCountry[$i]) {
                echo "<option value=\"$stCountry[$i]\" Selected>$stCountry[$i]</option>";
            } else {
                echo "<option value=\"$stCountry[$i]\">$stCountry[$i]</option>";
            }
        }
    }

    public static function yearloop($from = 1970, $selected = 2022, $join = 2)
    {
        for ($i = $from; $i <= date('Y') + $join; $i++) { ?>
            <option <?= $selected == $i ? 'selected' : '' ?> value="<?= $i ?>"><?= $i ?></option>
        <?php }
    }
}