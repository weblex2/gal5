<div>@php
    echo $selected;
    $arr = explode('|', $selected);
    $selected  = $arr[0];
    echo "<br>sel = ".$selected."<br>";
    $collation  = $arr[2];
    echo $collation;
    #print_r($col);
@endphp
    <select lang="en" dir="ltr" name="field_collation[0]" id="field_0_5">
        <option value=""></option>
              <optgroup label="armscii8" title="ARMSCII-8 Armenian">
                      <option value="armscii8_bin" title="Armenisch, Binär">armscii8_bin</option>
                      <option value="armscii8_general_ci" title="Armenisch, Beachtet nicht Groß- und Kleinschreibung">armscii8_general_ci</option>
                      <option value="armscii8_general_nopad_ci" title="Armenisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">armscii8_general_nopad_ci</option>
                      <option value="armscii8_nopad_bin" title="Armenisch, no-pad, Binär">armscii8_nopad_bin</option>
                  </optgroup>
              <optgroup label="ascii" title="US ASCII">
                      <option value="ascii_bin" title="Westeuropäisch, Binär">ascii_bin</option>
                      <option value="ascii_general_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">ascii_general_ci</option>
                      <option value="ascii_general_nopad_ci" title="Westeuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">ascii_general_nopad_ci</option>
                      <option value="ascii_nopad_bin" title="Westeuropäisch, no-pad, Binär">ascii_nopad_bin</option>
                  </optgroup>
              <optgroup label="big5" title="Big5 Traditional Chinese">
                      <option value="big5_bin" title="Traditionelles Chinesisch, Binär">big5_bin</option>
                      <option value="big5_chinese_ci" title="Traditionelles Chinesisch, Beachtet nicht Groß- und Kleinschreibung">big5_chinese_ci</option>
                      <option value="big5_chinese_nopad_ci" title="Traditionelles Chinesisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">big5_chinese_nopad_ci</option>
                      <option value="big5_nopad_bin" title="Traditionelles Chinesisch, no-pad, Binär">big5_nopad_bin</option>
                  </optgroup>
              <optgroup label="binary" title="Binary pseudo charset">
                      <option value="binary" title="Binär">binary</option>
                  </optgroup>
              <optgroup label="cp1250" title="Windows Central European">
                      <option value="cp1250_bin" title="Mitteleuropäisch, Binär">cp1250_bin</option>
                      <option value="cp1250_croatian_ci" title="Kroatisch, Beachtet nicht Groß- und Kleinschreibung">cp1250_croatian_ci</option>
                      <option value="cp1250_czech_cs" title="Tschechisch, Beachtet Groß- und Kleinschreibung">cp1250_czech_cs</option>
                      <option value="cp1250_general_ci" title="Mitteleuropäisch, Beachtet nicht Groß- und Kleinschreibung">cp1250_general_ci</option>
                      <option value="cp1250_general_nopad_ci" title="Mitteleuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp1250_general_nopad_ci</option>
                      <option value="cp1250_nopad_bin" title="Mitteleuropäisch, no-pad, Binär">cp1250_nopad_bin</option>
                      <option value="cp1250_polish_ci" title="Polnisch, Beachtet nicht Groß- und Kleinschreibung">cp1250_polish_ci</option>
                  </optgroup>
              <optgroup label="cp1251" title="Windows Cyrillic">
                      <option value="cp1251_bin" title="Kyrillisch, Binär">cp1251_bin</option>
                      <option value="cp1251_bulgarian_ci" title="Bulgarisch, Beachtet nicht Groß- und Kleinschreibung">cp1251_bulgarian_ci</option>
                      <option value="cp1251_general_ci" title="Kyrillisch, Beachtet nicht Groß- und Kleinschreibung">cp1251_general_ci</option>
                      <option value="cp1251_general_cs" title="Kyrillisch, Beachtet Groß- und Kleinschreibung">cp1251_general_cs</option>
                      <option value="cp1251_general_nopad_ci" title="Kyrillisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp1251_general_nopad_ci</option>
                      <option value="cp1251_nopad_bin" title="Kyrillisch, no-pad, Binär">cp1251_nopad_bin</option>
                      <option value="cp1251_ukrainian_ci" title="Ukrainisch, Beachtet nicht Groß- und Kleinschreibung">cp1251_ukrainian_ci</option>
                  </optgroup>
              <optgroup label="cp1256" title="Windows Arabic">
                      <option value="cp1256_bin" title="Arabisch, Binär">cp1256_bin</option>
                      <option value="cp1256_general_ci" title="Arabisch, Beachtet nicht Groß- und Kleinschreibung">cp1256_general_ci</option>
                      <option value="cp1256_general_nopad_ci" title="Arabisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp1256_general_nopad_ci</option>
                      <option value="cp1256_nopad_bin" title="Arabisch, no-pad, Binär">cp1256_nopad_bin</option>
                  </optgroup>
              <optgroup label="cp1257" title="Windows Baltic">
                      <option value="cp1257_bin" title="Baltisch, Binär">cp1257_bin</option>
                      <option value="cp1257_general_ci" title="Baltisch, Beachtet nicht Groß- und Kleinschreibung">cp1257_general_ci</option>
                      <option value="cp1257_general_nopad_ci" title="Baltisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp1257_general_nopad_ci</option>
                      <option value="cp1257_lithuanian_ci" title="Litauisch, Beachtet nicht Groß- und Kleinschreibung">cp1257_lithuanian_ci</option>
                      <option value="cp1257_nopad_bin" title="Baltisch, no-pad, Binär">cp1257_nopad_bin</option>
                  </optgroup>
              <optgroup label="cp850" title="DOS West European">
                      <option value="cp850_bin" title="Westeuropäisch, Binär">cp850_bin</option>
                      <option value="cp850_general_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">cp850_general_ci</option>
                      <option value="cp850_general_nopad_ci" title="Westeuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp850_general_nopad_ci</option>
                      <option value="cp850_nopad_bin" title="Westeuropäisch, no-pad, Binär">cp850_nopad_bin</option>
                  </optgroup>
              <optgroup label="cp852" title="DOS Central European">
                      <option value="cp852_bin" title="Mitteleuropäisch, Binär">cp852_bin</option>
                      <option value="cp852_general_ci" title="Mitteleuropäisch, Beachtet nicht Groß- und Kleinschreibung">cp852_general_ci</option>
                      <option value="cp852_general_nopad_ci" title="Mitteleuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp852_general_nopad_ci</option>
                      <option value="cp852_nopad_bin" title="Mitteleuropäisch, no-pad, Binär">cp852_nopad_bin</option>
                  </optgroup>
              <optgroup label="cp866" title="DOS Russian">
                      <option value="cp866_bin" title="Russisch, Binär">cp866_bin</option>
                      <option value="cp866_general_ci" title="Russisch, Beachtet nicht Groß- und Kleinschreibung">cp866_general_ci</option>
                      <option value="cp866_general_nopad_ci" title="Russisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp866_general_nopad_ci</option>
                      <option value="cp866_nopad_bin" title="Russisch, no-pad, Binär">cp866_nopad_bin</option>
                  </optgroup>
              <optgroup label="cp932" title="SJIS for Windows Japanese">
                      <option value="cp932_bin" title="Japanisch, Binär">cp932_bin</option>
                      <option value="cp932_japanese_ci" title="Japanisch, Beachtet nicht Groß- und Kleinschreibung">cp932_japanese_ci</option>
                      <option value="cp932_japanese_nopad_ci" title="Japanisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">cp932_japanese_nopad_ci</option>
                      <option value="cp932_nopad_bin" title="Japanisch, no-pad, Binär">cp932_nopad_bin</option>
                  </optgroup>
              <optgroup label="dec8" title="DEC West European">
                      <option value="dec8_bin" title="Westeuropäisch, Binär">dec8_bin</option>
                      <option value="dec8_nopad_bin" title="Westeuropäisch, no-pad, Binär">dec8_nopad_bin</option>
                      <option value="dec8_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">dec8_swedish_ci</option>
                      <option value="dec8_swedish_nopad_ci" title="Schwedisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">dec8_swedish_nopad_ci</option>
                  </optgroup>
              <optgroup label="eucjpms" title="UJIS for Windows Japanese">
                      <option value="eucjpms_bin" title="Japanisch, Binär">eucjpms_bin</option>
                      <option value="eucjpms_japanese_ci" title="Japanisch, Beachtet nicht Groß- und Kleinschreibung">eucjpms_japanese_ci</option>
                      <option value="eucjpms_japanese_nopad_ci" title="Japanisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">eucjpms_japanese_nopad_ci</option>
                      <option value="eucjpms_nopad_bin" title="Japanisch, no-pad, Binär">eucjpms_nopad_bin</option>
                  </optgroup>
              <optgroup label="euckr" title="EUC-KR Korean">
                      <option value="euckr_bin" title="Koreanisch, Binär">euckr_bin</option>
                      <option value="euckr_korean_ci" title="Koreanisch, Beachtet nicht Groß- und Kleinschreibung">euckr_korean_ci</option>
                      <option value="euckr_korean_nopad_ci" title="Koreanisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">euckr_korean_nopad_ci</option>
                      <option value="euckr_nopad_bin" title="Koreanisch, no-pad, Binär">euckr_nopad_bin</option>
                  </optgroup>
              <optgroup label="gb2312" title="GB2312 Simplified Chinese">
                      <option value="gb2312_bin" title="Vereinfachtes Chinesisch, Binär">gb2312_bin</option>
                      <option value="gb2312_chinese_ci" title="Vereinfachtes Chinesisch, Beachtet nicht Groß- und Kleinschreibung">gb2312_chinese_ci</option>
                      <option value="gb2312_chinese_nopad_ci" title="Vereinfachtes Chinesisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">gb2312_chinese_nopad_ci</option>
                      <option value="gb2312_nopad_bin" title="Vereinfachtes Chinesisch, no-pad, Binär">gb2312_nopad_bin</option>
                  </optgroup>
              <optgroup label="gbk" title="GBK Simplified Chinese">
                      <option value="gbk_bin" title="Vereinfachtes Chinesisch, Binär">gbk_bin</option>
                      <option value="gbk_chinese_ci" title="Vereinfachtes Chinesisch, Beachtet nicht Groß- und Kleinschreibung">gbk_chinese_ci</option>
                      <option value="gbk_chinese_nopad_ci" title="Vereinfachtes Chinesisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">gbk_chinese_nopad_ci</option>
                      <option value="gbk_nopad_bin" title="Vereinfachtes Chinesisch, no-pad, Binär">gbk_nopad_bin</option>
                  </optgroup>
              <optgroup label="geostd8" title="GEOSTD8 Georgian">
                      <option value="geostd8_bin" title="Georgisch, Binär">geostd8_bin</option>
                      <option value="geostd8_general_ci" title="Georgisch, Beachtet nicht Groß- und Kleinschreibung">geostd8_general_ci</option>
                      <option value="geostd8_general_nopad_ci" title="Georgisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">geostd8_general_nopad_ci</option>
                      <option value="geostd8_nopad_bin" title="Georgisch, no-pad, Binär">geostd8_nopad_bin</option>
                  </optgroup>
              <optgroup label="greek" title="ISO 8859-7 Greek">
                      <option value="greek_bin" title="Griechisch, Binär">greek_bin</option>
                      <option value="greek_general_ci" title="Griechisch, Beachtet nicht Groß- und Kleinschreibung">greek_general_ci</option>
                      <option value="greek_general_nopad_ci" title="Griechisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">greek_general_nopad_ci</option>
                      <option value="greek_nopad_bin" title="Griechisch, no-pad, Binär">greek_nopad_bin</option>
                  </optgroup>
              <optgroup label="hebrew" title="ISO 8859-8 Hebrew">
                      <option value="hebrew_bin" title="Hebräisch, Binär">hebrew_bin</option>
                      <option value="hebrew_general_ci" title="Hebräisch, Beachtet nicht Groß- und Kleinschreibung">hebrew_general_ci</option>
                      <option value="hebrew_general_nopad_ci" title="Hebräisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">hebrew_general_nopad_ci</option>
                      <option value="hebrew_nopad_bin" title="Hebräisch, no-pad, Binär">hebrew_nopad_bin</option>
                  </optgroup>
              <optgroup label="hp8" title="HP West European">
                      <option value="hp8_bin" title="Westeuropäisch, Binär">hp8_bin</option>
                      <option value="hp8_english_ci" title="Englisch, Beachtet nicht Groß- und Kleinschreibung">hp8_english_ci</option>
                      <option value="hp8_english_nopad_ci" title="Englisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">hp8_english_nopad_ci</option>
                      <option value="hp8_nopad_bin" title="Westeuropäisch, no-pad, Binär">hp8_nopad_bin</option>
                  </optgroup>
              <optgroup label="keybcs2" title="DOS Kamenicky Czech-Slovak">
                      <option value="keybcs2_bin" title="Tschechoslowakisch, Binär">keybcs2_bin</option>
                      <option value="keybcs2_general_ci" title="Tschechoslowakisch, Beachtet nicht Groß- und Kleinschreibung">keybcs2_general_ci</option>
                      <option value="keybcs2_general_nopad_ci" title="Tschechoslowakisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">keybcs2_general_nopad_ci</option>
                      <option value="keybcs2_nopad_bin" title="Tschechoslowakisch, no-pad, Binär">keybcs2_nopad_bin</option>
                  </optgroup>
              <optgroup label="koi8r" title="KOI8-R Relcom Russian">
                      <option value="koi8r_bin" title="Russisch, Binär">koi8r_bin</option>
                      <option value="koi8r_general_ci" title="Russisch, Beachtet nicht Groß- und Kleinschreibung">koi8r_general_ci</option>
                      <option value="koi8r_general_nopad_ci" title="Russisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">koi8r_general_nopad_ci</option>
                      <option value="koi8r_nopad_bin" title="Russisch, no-pad, Binär">koi8r_nopad_bin</option>
                  </optgroup>
              <optgroup label="koi8u" title="KOI8-U Ukrainian">
                      <option value="koi8u_bin" title="Ukrainisch, Binär">koi8u_bin</option>
                      <option value="koi8u_general_ci" title="Ukrainisch, Beachtet nicht Groß- und Kleinschreibung">koi8u_general_ci</option>
                      <option value="koi8u_general_nopad_ci" title="Ukrainisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">koi8u_general_nopad_ci</option>
                      <option value="koi8u_nopad_bin" title="Ukrainisch, no-pad, Binär">koi8u_nopad_bin</option>
                  </optgroup>
              <optgroup label="latin1" title="cp1252 West European">
                      <option value="latin1_bin" title="Westeuropäisch, Binär">latin1_bin</option>
                      <option value="latin1_danish_ci" title="Dänisch, Beachtet nicht Groß- und Kleinschreibung">latin1_danish_ci</option>
                      <option value="latin1_general_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">latin1_general_ci</option>
                      <option value="latin1_general_cs" title="Westeuropäisch, Beachtet Groß- und Kleinschreibung">latin1_general_cs</option>
                      <option value="latin1_german1_ci" title="Deutsch (Strukturverzeichnis), Beachtet nicht Groß- und Kleinschreibung">latin1_german1_ci</option>
                      <option value="latin1_german2_ci" title="Deutsch (Telefonbuchverzeichnis), Beachtet nicht Groß- und Kleinschreibung">latin1_german2_ci</option>
                      <option value="latin1_nopad_bin" title="Westeuropäisch, no-pad, Binär">latin1_nopad_bin</option>
                      <option value="latin1_spanish_ci" title="Spanisch (modern), Beachtet nicht Groß- und Kleinschreibung">latin1_spanish_ci</option>
                      <option value="latin1_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">latin1_swedish_ci</option>
                      <option value="latin1_swedish_nopad_ci" title="Schwedisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">latin1_swedish_nopad_ci</option>
                  </optgroup>
              <optgroup label="latin2" title="ISO 8859-2 Central European">
                      <option value="latin2_bin" title="Mitteleuropäisch, Binär">latin2_bin</option>
                      <option value="latin2_croatian_ci" title="Kroatisch, Beachtet nicht Groß- und Kleinschreibung">latin2_croatian_ci</option>
                      <option value="latin2_czech_cs" title="Tschechisch, Beachtet Groß- und Kleinschreibung">latin2_czech_cs</option>
                      <option value="latin2_general_ci" title="Mitteleuropäisch, Beachtet nicht Groß- und Kleinschreibung">latin2_general_ci</option>
                      <option value="latin2_general_nopad_ci" title="Mitteleuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">latin2_general_nopad_ci</option>
                      <option value="latin2_hungarian_ci" title="Ungarisch, Beachtet nicht Groß- und Kleinschreibung">latin2_hungarian_ci</option>
                      <option value="latin2_nopad_bin" title="Mitteleuropäisch, no-pad, Binär">latin2_nopad_bin</option>
                  </optgroup>
              <optgroup label="latin5" title="ISO 8859-9 Turkish">
                      <option value="latin5_bin" title="Türkisch, Binär">latin5_bin</option>
                      <option value="latin5_nopad_bin" title="Türkisch, no-pad, Binär">latin5_nopad_bin</option>
                      <option value="latin5_turkish_ci" title="Türkisch, Beachtet nicht Groß- und Kleinschreibung">latin5_turkish_ci</option>
                      <option value="latin5_turkish_nopad_ci" title="Türkisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">latin5_turkish_nopad_ci</option>
                  </optgroup>
              <optgroup label="latin7" title="ISO 8859-13 Baltic">
                      <option value="latin7_bin" title="Baltisch, Binär">latin7_bin</option>
                      <option value="latin7_estonian_cs" title="Estnisch, Beachtet Groß- und Kleinschreibung">latin7_estonian_cs</option>
                      <option value="latin7_general_ci" title="Baltisch, Beachtet nicht Groß- und Kleinschreibung">latin7_general_ci</option>
                      <option value="latin7_general_cs" title="Baltisch, Beachtet Groß- und Kleinschreibung">latin7_general_cs</option>
                      <option value="latin7_general_nopad_ci" title="Baltisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">latin7_general_nopad_ci</option>
                      <option value="latin7_nopad_bin" title="Baltisch, no-pad, Binär">latin7_nopad_bin</option>
                  </optgroup>
              <optgroup label="macce" title="Mac Central European">
                      <option value="macce_bin" title="Mitteleuropäisch, Binär">macce_bin</option>
                      <option value="macce_general_ci" title="Mitteleuropäisch, Beachtet nicht Groß- und Kleinschreibung">macce_general_ci</option>
                      <option value="macce_general_nopad_ci" title="Mitteleuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">macce_general_nopad_ci</option>
                      <option value="macce_nopad_bin" title="Mitteleuropäisch, no-pad, Binär">macce_nopad_bin</option>
                  </optgroup>
              <optgroup label="macroman" title="Mac West European">
                      <option value="macroman_bin" title="Westeuropäisch, Binär">macroman_bin</option>
                      <option value="macroman_general_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">macroman_general_ci</option>
                      <option value="macroman_general_nopad_ci" title="Westeuropäisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">macroman_general_nopad_ci</option>
                      <option value="macroman_nopad_bin" title="Westeuropäisch, no-pad, Binär">macroman_nopad_bin</option>
                  </optgroup>
              <optgroup label="sjis" title="Shift-JIS Japanese">
                      <option value="sjis_bin" title="Japanisch, Binär">sjis_bin</option>
                      <option value="sjis_japanese_ci" title="Japanisch, Beachtet nicht Groß- und Kleinschreibung">sjis_japanese_ci</option>
                      <option value="sjis_japanese_nopad_ci" title="Japanisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">sjis_japanese_nopad_ci</option>
                      <option value="sjis_nopad_bin" title="Japanisch, no-pad, Binär">sjis_nopad_bin</option>
                  </optgroup>
              <optgroup label="swe7" title="7bit Swedish">
                      <option value="swe7_bin" title="Schwedisch, Binär">swe7_bin</option>
                      <option value="swe7_nopad_bin" title="Schwedisch, no-pad, Binär">swe7_nopad_bin</option>
                      <option value="swe7_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">swe7_swedish_ci</option>
                      <option value="swe7_swedish_nopad_ci" title="Schwedisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">swe7_swedish_nopad_ci</option>
                  </optgroup>
              <optgroup label="tis620" title="TIS620 Thai">
                      <option value="tis620_bin" title="Thai, Binär">tis620_bin</option>
                      <option value="tis620_nopad_bin" title="Thai, no-pad, Binär">tis620_nopad_bin</option>
                      <option value="tis620_thai_ci" title="Thai, Beachtet nicht Groß- und Kleinschreibung">tis620_thai_ci</option>
                      <option value="tis620_thai_nopad_ci" title="Thai, no-pad, Beachtet nicht Groß- und Kleinschreibung">tis620_thai_nopad_ci</option>
                  </optgroup>
              <optgroup label="ucs2" title="UCS-2 Unicode">
                      <option value="ucs2_bin" title="Unicode, Binär">ucs2_bin</option>
                      <option value="ucs2_croatian_ci" title="Kroatisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_croatian_ci</option>
                      <option value="ucs2_croatian_mysql561_ci" title="Kroatisch (MySQL 5.6.1), Beachtet nicht Groß- und Kleinschreibung">ucs2_croatian_mysql561_ci</option>
                      <option value="ucs2_czech_ci" title="Tschechisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_czech_ci</option>
                      <option value="ucs2_danish_ci" title="Dänisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_danish_ci</option>
                      <option value="ucs2_esperanto_ci" title="Esperanto, Beachtet nicht Groß- und Kleinschreibung">ucs2_esperanto_ci</option>
                      <option value="ucs2_estonian_ci" title="Estnisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_estonian_ci</option>
                      <option value="ucs2_general_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">ucs2_general_ci</option>
                      <option value="ucs2_general_mysql500_ci" title="Unicode (MySQL 5.0.0), Beachtet nicht Groß- und Kleinschreibung">ucs2_general_mysql500_ci</option>
                      <option value="ucs2_general_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">ucs2_general_nopad_ci</option>
                      <option value="ucs2_german2_ci" title="Deutsch (Telefonbuchverzeichnis), Beachtet nicht Groß- und Kleinschreibung">ucs2_german2_ci</option>
                      <option value="ucs2_hungarian_ci" title="Ungarisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_hungarian_ci</option>
                      <option value="ucs2_icelandic_ci" title="Isländisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_icelandic_ci</option>
                      <option value="ucs2_latvian_ci" title="Lettisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_latvian_ci</option>
                      <option value="ucs2_lithuanian_ci" title="Litauisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_lithuanian_ci</option>
                      <option value="ucs2_myanmar_ci" title="Birmanisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_myanmar_ci</option>
                      <option value="ucs2_nopad_bin" title="Unicode, no-pad, Binär">ucs2_nopad_bin</option>
                      <option value="ucs2_persian_ci" title="Persisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_persian_ci</option>
                      <option value="ucs2_polish_ci" title="Polnisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_polish_ci</option>
                      <option value="ucs2_roman_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_roman_ci</option>
                      <option value="ucs2_romanian_ci" title="Rumänisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_romanian_ci</option>
                      <option value="ucs2_sinhala_ci" title="Singhalesisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_sinhala_ci</option>
                      <option value="ucs2_slovak_ci" title="Slovakisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_slovak_ci</option>
                      <option value="ucs2_slovenian_ci" title="Slovenisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_slovenian_ci</option>
                      <option value="ucs2_spanish2_ci" title="Spanisch (traditionell), Beachtet nicht Groß- und Kleinschreibung">ucs2_spanish2_ci</option>
                      <option value="ucs2_spanish_ci" title="Spanisch (modern), Beachtet nicht Groß- und Kleinschreibung">ucs2_spanish_ci</option>
                      <option value="ucs2_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_swedish_ci</option>
                      <option value="ucs2_thai_520_w2" title="Thai (UCA 5.2.0), mehrschichtig">ucs2_thai_520_w2</option>
                      <option value="ucs2_turkish_ci" title="Türkisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_turkish_ci</option>
                      <option value="ucs2_unicode_520_ci" title="Unicode (UCA 5.2.0), Beachtet nicht Groß- und Kleinschreibung">ucs2_unicode_520_ci</option>
                      <option value="ucs2_unicode_520_nopad_ci" title="Unicode (UCA 5.2.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">ucs2_unicode_520_nopad_ci</option>
                      <option value="ucs2_unicode_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">ucs2_unicode_ci</option>
                      <option value="ucs2_unicode_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">ucs2_unicode_nopad_ci</option>
                      <option value="ucs2_vietnamese_ci" title="Vietnamesisch, Beachtet nicht Groß- und Kleinschreibung">ucs2_vietnamese_ci</option>
                  </optgroup>
              <optgroup label="ujis" title="EUC-JP Japanese">
                      <option value="ujis_bin" title="Japanisch, Binär">ujis_bin</option>
                      <option value="ujis_japanese_ci" title="Japanisch, Beachtet nicht Groß- und Kleinschreibung">ujis_japanese_ci</option>
                      <option value="ujis_japanese_nopad_ci" title="Japanisch, no-pad, Beachtet nicht Groß- und Kleinschreibung">ujis_japanese_nopad_ci</option>
                      <option value="ujis_nopad_bin" title="Japanisch, no-pad, Binär">ujis_nopad_bin</option>
                  </optgroup>
              <optgroup label="utf16" title="UTF-16 Unicode">
                      <option value="utf16_bin" title="Unicode, Binär">utf16_bin</option>
                      <option value="utf16_croatian_ci" title="Kroatisch, Beachtet nicht Groß- und Kleinschreibung">utf16_croatian_ci</option>
                      <option value="utf16_croatian_mysql561_ci" title="Kroatisch (MySQL 5.6.1), Beachtet nicht Groß- und Kleinschreibung">utf16_croatian_mysql561_ci</option>
                      <option value="utf16_czech_ci" title="Tschechisch, Beachtet nicht Groß- und Kleinschreibung">utf16_czech_ci</option>
                      <option value="utf16_danish_ci" title="Dänisch, Beachtet nicht Groß- und Kleinschreibung">utf16_danish_ci</option>
                      <option value="utf16_esperanto_ci" title="Esperanto, Beachtet nicht Groß- und Kleinschreibung">utf16_esperanto_ci</option>
                      <option value="utf16_estonian_ci" title="Estnisch, Beachtet nicht Groß- und Kleinschreibung">utf16_estonian_ci</option>
                      <option value="utf16_general_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf16_general_ci</option>
                      <option value="utf16_general_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf16_general_nopad_ci</option>
                      <option value="utf16_german2_ci" title="Deutsch (Telefonbuchverzeichnis), Beachtet nicht Groß- und Kleinschreibung">utf16_german2_ci</option>
                      <option value="utf16_hungarian_ci" title="Ungarisch, Beachtet nicht Groß- und Kleinschreibung">utf16_hungarian_ci</option>
                      <option value="utf16_icelandic_ci" title="Isländisch, Beachtet nicht Groß- und Kleinschreibung">utf16_icelandic_ci</option>
                      <option value="utf16_latvian_ci" title="Lettisch, Beachtet nicht Groß- und Kleinschreibung">utf16_latvian_ci</option>
                      <option value="utf16_lithuanian_ci" title="Litauisch, Beachtet nicht Groß- und Kleinschreibung">utf16_lithuanian_ci</option>
                      <option value="utf16_myanmar_ci" title="Birmanisch, Beachtet nicht Groß- und Kleinschreibung">utf16_myanmar_ci</option>
                      <option value="utf16_nopad_bin" title="Unicode, no-pad, Binär">utf16_nopad_bin</option>
                      <option value="utf16_persian_ci" title="Persisch, Beachtet nicht Groß- und Kleinschreibung">utf16_persian_ci</option>
                      <option value="utf16_polish_ci" title="Polnisch, Beachtet nicht Groß- und Kleinschreibung">utf16_polish_ci</option>
                      <option value="utf16_roman_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">utf16_roman_ci</option>
                      <option value="utf16_romanian_ci" title="Rumänisch, Beachtet nicht Groß- und Kleinschreibung">utf16_romanian_ci</option>
                      <option value="utf16_sinhala_ci" title="Singhalesisch, Beachtet nicht Groß- und Kleinschreibung">utf16_sinhala_ci</option>
                      <option value="utf16_slovak_ci" title="Slovakisch, Beachtet nicht Groß- und Kleinschreibung">utf16_slovak_ci</option>
                      <option value="utf16_slovenian_ci" title="Slovenisch, Beachtet nicht Groß- und Kleinschreibung">utf16_slovenian_ci</option>
                      <option value="utf16_spanish2_ci" title="Spanisch (traditionell), Beachtet nicht Groß- und Kleinschreibung">utf16_spanish2_ci</option>
                      <option value="utf16_spanish_ci" title="Spanisch (modern), Beachtet nicht Groß- und Kleinschreibung">utf16_spanish_ci</option>
                      <option value="utf16_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">utf16_swedish_ci</option>
                      <option value="utf16_thai_520_w2" title="Thai (UCA 5.2.0), mehrschichtig">utf16_thai_520_w2</option>
                      <option value="utf16_turkish_ci" title="Türkisch, Beachtet nicht Groß- und Kleinschreibung">utf16_turkish_ci</option>
                      <option value="utf16_unicode_520_ci" title="Unicode (UCA 5.2.0), Beachtet nicht Groß- und Kleinschreibung">utf16_unicode_520_ci</option>
                      <option value="utf16_unicode_520_nopad_ci" title="Unicode (UCA 5.2.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">utf16_unicode_520_nopad_ci</option>
                      <option value="utf16_unicode_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf16_unicode_ci</option>
                      <option value="utf16_unicode_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf16_unicode_nopad_ci</option>
                      <option value="utf16_vietnamese_ci" title="Vietnamesisch, Beachtet nicht Groß- und Kleinschreibung">utf16_vietnamese_ci</option>
                  </optgroup>
              <optgroup label="utf16le" title="UTF-16LE Unicode">
                      <option value="utf16le_bin" title="Unicode, Binär">utf16le_bin</option>
                      <option value="utf16le_general_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf16le_general_ci</option>
                      <option value="utf16le_general_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf16le_general_nopad_ci</option>
                      <option value="utf16le_nopad_bin" title="Unicode, no-pad, Binär">utf16le_nopad_bin</option>
                  </optgroup>
              <optgroup label="utf32" title="UTF-32 Unicode">
                      <option value="utf32_bin" title="Unicode, Binär">utf32_bin</option>
                      <option value="utf32_croatian_ci" title="Kroatisch, Beachtet nicht Groß- und Kleinschreibung">utf32_croatian_ci</option>
                      <option value="utf32_croatian_mysql561_ci" title="Kroatisch (MySQL 5.6.1), Beachtet nicht Groß- und Kleinschreibung">utf32_croatian_mysql561_ci</option>
                      <option value="utf32_czech_ci" title="Tschechisch, Beachtet nicht Groß- und Kleinschreibung">utf32_czech_ci</option>
                      <option value="utf32_danish_ci" title="Dänisch, Beachtet nicht Groß- und Kleinschreibung">utf32_danish_ci</option>
                      <option value="utf32_esperanto_ci" title="Esperanto, Beachtet nicht Groß- und Kleinschreibung">utf32_esperanto_ci</option>
                      <option value="utf32_estonian_ci" title="Estnisch, Beachtet nicht Groß- und Kleinschreibung">utf32_estonian_ci</option>
                      <option value="utf32_general_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf32_general_ci</option>
                      <option value="utf32_general_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf32_general_nopad_ci</option>
                      <option value="utf32_german2_ci" title="Deutsch (Telefonbuchverzeichnis), Beachtet nicht Groß- und Kleinschreibung">utf32_german2_ci</option>
                      <option value="utf32_hungarian_ci" title="Ungarisch, Beachtet nicht Groß- und Kleinschreibung">utf32_hungarian_ci</option>
                      <option value="utf32_icelandic_ci" title="Isländisch, Beachtet nicht Groß- und Kleinschreibung">utf32_icelandic_ci</option>
                      <option value="utf32_latvian_ci" title="Lettisch, Beachtet nicht Groß- und Kleinschreibung">utf32_latvian_ci</option>
                      <option value="utf32_lithuanian_ci" title="Litauisch, Beachtet nicht Groß- und Kleinschreibung">utf32_lithuanian_ci</option>
                      <option value="utf32_myanmar_ci" title="Birmanisch, Beachtet nicht Groß- und Kleinschreibung">utf32_myanmar_ci</option>
                      <option value="utf32_nopad_bin" title="Unicode, no-pad, Binär">utf32_nopad_bin</option>
                      <option value="utf32_persian_ci" title="Persisch, Beachtet nicht Groß- und Kleinschreibung">utf32_persian_ci</option>
                      <option value="utf32_polish_ci" title="Polnisch, Beachtet nicht Groß- und Kleinschreibung">utf32_polish_ci</option>
                      <option value="utf32_roman_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">utf32_roman_ci</option>
                      <option value="utf32_romanian_ci" title="Rumänisch, Beachtet nicht Groß- und Kleinschreibung">utf32_romanian_ci</option>
                      <option value="utf32_sinhala_ci" title="Singhalesisch, Beachtet nicht Groß- und Kleinschreibung">utf32_sinhala_ci</option>
                      <option value="utf32_slovak_ci" title="Slovakisch, Beachtet nicht Groß- und Kleinschreibung">utf32_slovak_ci</option>
                      <option value="utf32_slovenian_ci" title="Slovenisch, Beachtet nicht Groß- und Kleinschreibung">utf32_slovenian_ci</option>
                      <option value="utf32_spanish2_ci" title="Spanisch (traditionell), Beachtet nicht Groß- und Kleinschreibung">utf32_spanish2_ci</option>
                      <option value="utf32_spanish_ci" title="Spanisch (modern), Beachtet nicht Groß- und Kleinschreibung">utf32_spanish_ci</option>
                      <option value="utf32_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">utf32_swedish_ci</option>
                      <option value="utf32_thai_520_w2" title="Thai (UCA 5.2.0), mehrschichtig">utf32_thai_520_w2</option>
                      <option value="utf32_turkish_ci" title="Türkisch, Beachtet nicht Groß- und Kleinschreibung">utf32_turkish_ci</option>
                      <option value="utf32_unicode_520_ci" title="Unicode (UCA 5.2.0), Beachtet nicht Groß- und Kleinschreibung">utf32_unicode_520_ci</option>
                      <option value="utf32_unicode_520_nopad_ci" title="Unicode (UCA 5.2.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">utf32_unicode_520_nopad_ci</option>
                      <option value="utf32_unicode_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf32_unicode_ci</option>
                      <option value="utf32_unicode_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf32_unicode_nopad_ci</option>
                      <option value="utf32_vietnamese_ci" title="Vietnamesisch, Beachtet nicht Groß- und Kleinschreibung">utf32_vietnamese_ci</option>
                  </optgroup>
              <optgroup label="utf8" title="UTF-8 Unicode">
                      <option value="utf8_bin" title="Unicode, Binär">utf8_bin</option>
                      <option value="utf8_croatian_ci" title="Kroatisch, Beachtet nicht Groß- und Kleinschreibung">utf8_croatian_ci</option>
                      <option value="utf8_croatian_mysql561_ci" title="Kroatisch (MySQL 5.6.1), Beachtet nicht Groß- und Kleinschreibung">utf8_croatian_mysql561_ci</option>
                      <option value="utf8_czech_ci" title="Tschechisch, Beachtet nicht Groß- und Kleinschreibung">utf8_czech_ci</option>
                      <option value="utf8_danish_ci" title="Dänisch, Beachtet nicht Groß- und Kleinschreibung">utf8_danish_ci</option>
                      <option value="utf8_esperanto_ci" title="Esperanto, Beachtet nicht Groß- und Kleinschreibung">utf8_esperanto_ci</option>
                      <option value="utf8_estonian_ci" title="Estnisch, Beachtet nicht Groß- und Kleinschreibung">utf8_estonian_ci</option>
                      <option value="utf8_general_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf8_general_ci</option>
                      <option value="utf8_general_mysql500_ci" title="Unicode (MySQL 5.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8_general_mysql500_ci</option>
                      <option value="utf8_general_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf8_general_nopad_ci</option>
                      <option value="utf8_german2_ci" title="Deutsch (Telefonbuchverzeichnis), Beachtet nicht Groß- und Kleinschreibung">utf8_german2_ci</option>
                      <option value="utf8_hungarian_ci" title="Ungarisch, Beachtet nicht Groß- und Kleinschreibung">utf8_hungarian_ci</option>
                      <option value="utf8_icelandic_ci" title="Isländisch, Beachtet nicht Groß- und Kleinschreibung">utf8_icelandic_ci</option>
                      <option value="utf8_latvian_ci" title="Lettisch, Beachtet nicht Groß- und Kleinschreibung">utf8_latvian_ci</option>
                      <option value="utf8_lithuanian_ci" title="Litauisch, Beachtet nicht Groß- und Kleinschreibung">utf8_lithuanian_ci</option>
                      <option value="utf8_myanmar_ci" title="Birmanisch, Beachtet nicht Groß- und Kleinschreibung">utf8_myanmar_ci</option>
                      <option value="utf8_nopad_bin" title="Unicode, no-pad, Binär">utf8_nopad_bin</option>
                      <option value="utf8_persian_ci" title="Persisch, Beachtet nicht Groß- und Kleinschreibung">utf8_persian_ci</option>
                      <option value="utf8_polish_ci" title="Polnisch, Beachtet nicht Groß- und Kleinschreibung">utf8_polish_ci</option>
                      <option value="utf8_roman_ci" title="Westeuropäisch, Beachtet nicht Groß- und Kleinschreibung">utf8_roman_ci</option>
                      <option value="utf8_romanian_ci" title="Rumänisch, Beachtet nicht Groß- und Kleinschreibung">utf8_romanian_ci</option>
                      <option value="utf8_sinhala_ci" title="Singhalesisch, Beachtet nicht Groß- und Kleinschreibung">utf8_sinhala_ci</option>
                      <option value="utf8_slovak_ci" title="Slovakisch, Beachtet nicht Groß- und Kleinschreibung">utf8_slovak_ci</option>
                      <option value="utf8_slovenian_ci" title="Slovenisch, Beachtet nicht Groß- und Kleinschreibung">utf8_slovenian_ci</option>
                      <option value="utf8_spanish2_ci" title="Spanisch (traditionell), Beachtet nicht Groß- und Kleinschreibung">utf8_spanish2_ci</option>
                      <option value="utf8_spanish_ci" title="Spanisch (modern), Beachtet nicht Groß- und Kleinschreibung">utf8_spanish_ci</option>
                      <option value="utf8_swedish_ci" title="Schwedisch, Beachtet nicht Groß- und Kleinschreibung">utf8_swedish_ci</option>
                      <option value="utf8_thai_520_w2" title="Thai (UCA 5.2.0), mehrschichtig">utf8_thai_520_w2</option>
                      <option value="utf8_turkish_ci" title="Türkisch, Beachtet nicht Groß- und Kleinschreibung">utf8_turkish_ci</option>
                      <option value="utf8_unicode_520_ci" title="Unicode (UCA 5.2.0), Beachtet nicht Groß- und Kleinschreibung">utf8_unicode_520_ci</option>
                      <option value="utf8_unicode_520_nopad_ci" title="Unicode (UCA 5.2.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">utf8_unicode_520_nopad_ci</option>
                      <option value="utf8_unicode_ci" title="Unicode, Beachtet nicht Groß- und Kleinschreibung">utf8_unicode_ci</option>
                      <option value="utf8_unicode_nopad_ci" title="Unicode, no-pad, Beachtet nicht Groß- und Kleinschreibung">utf8_unicode_nopad_ci</option>
                      <option value="utf8_vietnamese_ci" title="Vietnamesisch, Beachtet nicht Groß- und Kleinschreibung">utf8_vietnamese_ci</option>
                  </optgroup>
              <optgroup label="utf8mb4" title="UTF-8 Unicode">
                      <option value="utf8mb4_bin" title="Unicode (UCA 4.0.0), Binär">utf8mb4_bin</option>
                      <option value="utf8mb4_croatian_ci" title="Kroatisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_croatian_ci</option>
                      <option value="utf8mb4_croatian_mysql561_ci" title="Kroatisch (MySQL 5.6.1), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_croatian_mysql561_ci</option>
                      <option value="utf8mb4_czech_ci" title="Tschechisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_czech_ci</option>
                      <option value="utf8mb4_danish_ci" title="Dänisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_danish_ci</option>
                      <option value="utf8mb4_esperanto_ci" title="Esperanto (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_esperanto_ci</option>
                      <option value="utf8mb4_estonian_ci" title="Estnisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_estonian_ci</option>
                      <option value="utf8mb4_general_ci" title="Unicode (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung" {{$selected == 'utf8mb4_general_ci' ? "selected" : ""}}>>utf8mb4_general_ci</option>
                      <option value="utf8mb4_general_nopad_ci" title="Unicode (UCA 4.0.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">utf8mb4_general_nopad_ci</option>
                      <option value="utf8mb4_german2_ci" title="Deutsch (Telefonbuchverzeichnis) (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_german2_ci</option>
                      <option value="utf8mb4_hungarian_ci" title="Ungarisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_hungarian_ci</option>
                      <option value="utf8mb4_icelandic_ci" title="Isländisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_icelandic_ci</option>
                      <option value="utf8mb4_latvian_ci" title="Lettisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_latvian_ci</option>
                      <option value="utf8mb4_lithuanian_ci" title="Litauisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_lithuanian_ci</option>
                      <option value="utf8mb4_myanmar_ci" title="Birmanisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_myanmar_ci</option>
                      <option value="utf8mb4_nopad_bin" title="Unicode (UCA 4.0.0), no-pad, Binär">utf8mb4_nopad_bin</option>
                      <option value="utf8mb4_persian_ci" title="Persisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_persian_ci</option>
                      <option value="utf8mb4_polish_ci" title="Polnisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_polish_ci</option>
                      <option value="utf8mb4_roman_ci" title="Westeuropäisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_roman_ci</option>
                      <option value="utf8mb4_romanian_ci" title="Rumänisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_romanian_ci</option>
                      <option value="utf8mb4_sinhala_ci" title="Singhalesisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_sinhala_ci</option>
                      <option value="utf8mb4_slovak_ci" title="Slovakisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_slovak_ci</option>
                      <option value="utf8mb4_slovenian_ci" title="Slovenisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_slovenian_ci</option>
                      <option value="utf8mb4_spanish2_ci" title="Spanisch (traditionell) (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_spanish2_ci</option>
                      <option value="utf8mb4_spanish_ci" title="Spanisch (modern) (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_spanish_ci</option>
                      <option value="utf8mb4_swedish_ci" title="Schwedisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_swedish_ci</option>
                      <option value="utf8mb4_thai_520_w2" title="Thai (UCA 5.2.0), mehrschichtig">utf8mb4_thai_520_w2</option>
                      <option value="utf8mb4_turkish_ci" title="Türkisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_turkish_ci</option>
                      <option value="utf8mb4_unicode_520_ci" title="Unicode (UCA 5.2.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_unicode_520_ci</option>
                      <option value="utf8mb4_unicode_520_nopad_ci" title="Unicode (UCA 5.2.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">utf8mb4_unicode_520_nopad_ci</option>
                      <option value="utf8mb4_unicode_ci" title="Unicode (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_unicode_ci</option>
                      <option value="utf8mb4_unicode_nopad_ci" title="Unicode (UCA 4.0.0), no-pad, Beachtet nicht Groß- und Kleinschreibung">utf8mb4_unicode_nopad_ci</option>
                      <option value="utf8mb4_vietnamese_ci" title="Vietnamesisch (UCA 4.0.0), Beachtet nicht Groß- und Kleinschreibung">utf8mb4_vietnamese_ci</option>
                  </optgroup>
          </select>
</div>