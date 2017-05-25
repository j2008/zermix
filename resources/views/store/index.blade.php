@extends('layout')

@section('title', 'Store สถานที่จำหน่าย')

@section('header')
  <link rel="stylesheet" type="text/css" href="css/store.css">
  <script src="js/store.js" type="text/javascript" ></script>
  <meta name="description" content="รวมสถานที่จำหน่ายผลิตภัณฑ์ ZERMIX มีแล้วที่ร้านขายยาชั้นนำ และร้านขายยาทั่วไปทั่วประเทศไทย">
@endsection

@section('content')
  <div class="map">
    <!--
    <div class="map-title"><span class="title-h2"><h2>คลิกที่แผนที่เพื่อเลือกภาค</h2></span></div>
    <img src="img/map.png" usemap="#map">
    <map name="map">
      <area shape="poly" coords="2,100,40,29,145,2,209,43,198,143,143,172,126,136,109,164,59,165,2,100" onClick="openMap('north')" />
      <area shape="poly" coords="59,165,75,221,48,279,116,454,95,495,119,495,142,438,146,379,131,297,93,279,97,210,117,189,109,164,59,165" onClick="openMap('west')" />
      <area shape="poly" coords="198,143,143,172,126,136,109,164,117,189,97,210,93,279,131,297,142,353,171,342,188,343,220,324,203,307,213,293,210,211,229,194,225,181,197,178,198,143" onClick="openMap('center')" />
      <area shape="poly" coords="142,353,171,342,188,343,187,366,172,363,146,370,142,353" onClick="openMap('bangkok')" />
      <area shape="poly" coords="198,143,197,178,225,181,229,194,210,211,213,293,203,307,220,324,425,327,433,248,391,208,391,156,329,99,249,111,198,143" onClick="openMap('north-east')" />
      <area shape="poly" coords="220,324,292,326,284,475,230,413,180,412,187,366,188,343,220,324" onClick="openMap('east')" />
      <area shape="poly" coords="95,495,42,647,199,781,259,757,137,587,108,585,119,495,95,495" onClick="openMap('south')" />
    </map>
    <div class="store-detail"></div>
    -->
    <div class='store-detail map-bangkok'></div>
    <div class='store-detail map-center'></div>
    <div class='store-detail map-east'></div>
    <div class='store-detail map-north-east'></div>
    <div class='store-detail map-south'></div>
    <div class='store-detail map-west'></div>
    <div class='store-detail map-north'></div>
  </div>

  <div class="finding">
    <div class="background"></div>
    <div class="close-button">X</div>
    <div class="search-bar">
      <h3 style="color:white;text-align:center;">เลือกภาคที่ต้องการ<h3>
      <div class="region">
        <div class="region-bangkok" onClick="region_select('bangkok')">กทม</div>
        <div class="region-center" onClick="region_select('center')">กลาง</div>
        <div class="region-east" onClick="region_select('east')">ออก</div>
        <div class="region-north-east" onClick="region_select('north-east')">อีสาน</div>
        <div class="region-south" onClick="region_select('south')">ใต้</div>
        <div class="region-west" onClick="region_select('west')">ตก</div>
        <div class="region-north" onClick="region_select('north')">เหนือ</div>
      </div>
      <div class="search-keyword">
        <h3 style="color:white;text-align:center;">พิมพ์หาสถานที่ เช่น ห้าง,เขต,จังหวัด<h3>
        <input type="text" name="keyword" class="keyword" />
        <button onclick="next_find();">Next</button>
      </div>
    </div>
  </div>

  <img class="open-button" src="/img/finding.png">

@endsection
