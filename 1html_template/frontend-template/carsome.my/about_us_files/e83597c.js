(window.webpackJsonp=window.webpackJsonp||[]).push([[12],{1251:function(e,t,n){},1413:function(e,t,n){n(8)({target:"Math",stat:!0},{sign:n(497)})},1414:function(e,t,n){"use strict";n(1251)},1415:function(e,t,n){"use strict";var r=n(984),o=n.n(r);t.default=o.a},1416:function(e,t,n){"use strict";var r=n(985),o=n.n(r);t.default=o.a},1417:function(e,t,n){"use strict";var r=n(986),o=n.n(r);t.default=o.a},2225:function(e,t,n){"use strict";n.r(t);n(11),n(62),n(36),n(51),n(1413),n(317),n(218),n(45);var r=n(33),o=n(1),l=(n(66),n(5)),c=n(9),d=n(0),m=null,f=null,h=null,_={data:function(){return{guidelines:[],triggerOffset:0,triggerPoints:[],timeline:Object.entries(this.$t("timeline")).map((function(e,t){var n=Object(c.a)(e,2);return{year:n[0],events:n[1],actived:!t,offset:0}})),baseOffset:0,fromOffset:0,targetOffset:0,targetNodeIndex:0,carOffset:0,showDebugger:!1}},head:function(){return{title:this.$t("meta.title"),meta:[{hid:"description",name:"description",content:this.$t("meta.description")},{hid:"keywords",name:"keywords",content:this.$t("meta.keywords")}]}},watch:{targetOffset:function(){this.moveCarTo()}},mounted:function(){var e=this;return Object(l.a)(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,e.$nextTick();case 2:e.$amp.track("Page viewed"),e.initGuideLines(),window.addEventListener("scroll",e.detectScroll,{passive:!0}),window.addEventListener("resize",e.updateGuideLines,{passive:!0}),document.fonts&&"loaded"!==document.fonts.status&&document.fonts.ready.then((function(){e.updateGuideLines()}));case 7:case"end":return t.stop()}}),t)})))()},destroyed:function(){var e;(window.removeEventListener("scroll",this.detectScroll,{passive:!0}),window.removeEventListener("resize",this.updateGuideLines,{passive:!0}),this.showDebugger&&m)&&(m.$destroy(),null===(e=m.$el.parentNode)||void 0===e||e.removeChild(m.$el),m=null);null!==f&&(window.cancelAnimationFrame(f),f=null)},methods:{initGuideLines:function(){var e=this,t=this.$refs.timeline.querySelectorAll(".timeline__item"),n=0;Array.prototype.forEach.call(t,(function(t){n++;var r={offset:0,el:t,actived:!1};t.setAttribute("data-trigger-id",n),e.triggerPoints.push(r)})),this.$route.query.d&&(this.showDebugger=!0,this.installGuideLineDebugger()),this.updateGuideLines(),this.detectScroll()},updateGuideLines:function(){var e=this;return Object(l.a)(regeneratorRuntime.mark((function t(){var n,r,o,l,c,d,m,_,k,v;return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return l=!1,null!==f&&(window.cancelAnimationFrame(f),h=null,l=!0),t.next=4,e.$nextTick();case 4:.6,c=window.document.body.clientHeight,e.triggerOffset=.6*c,d=e.$refs.timeline,m=0,_=d;do{m+=_.offsetTop||0}while(_=_.offsetParent);e.baseOffset=m,e.guidelines=e.triggerPoints.map((function(t,n){t.offset=t.el.offsetTop+m;var r=t.el.getAttribute("data-trigger-id");return e.timeline[n].offset=Math.max(0,t.el.offsetTop-90),e.timeline[n].position=t.el.offsetTop,{id:r,label:"line #".concat(r),style:{position:"absolute",top:t.offset+"px"},point:t}})),k=e.targetOffset-e.carOffset,v=null!==(n=null===(r=e.timeline)||void 0===r||null===(o=r[e.targetNodeIndex])||void 0===o?void 0:o.position)&&void 0!==n?n:0,e.carOffset=Math.max(0,v-k),e.targetOffset=v,e.detectScroll(),l&&e.moveCarTo();case 19:case"end":return t.stop()}}),t)})))()},detectScroll:function(){var e=this,t=document.scrollingElement,n=t.scrollTop+this.triggerOffset,r=t.scrollHeight===t.scrollTop+t.clientHeight,o=0;this.triggerPoints.forEach((function(t,l){t.actived=r||n>t.offset,t.actived&&(o=Math.max(t.offset,o),e.targetNodeIndex=Math.max(l,e.targetNodeIndex))})),o-=this.baseOffset,this.targetOffset=Math.max(this.targetOffset,o)},installGuideLineDebugger:function(){if(this.showDebugger||!m){var e=this;m=new d.default({data:function(){return{scrollTop:0}},mounted:function(){document.addEventListener("scroll",this.detectScroll,{passive:!0}),document.addEventListener("resize",this.detectScroll,{passive:!0}),this.detectScroll()},destroyed:function(){document.removeEventListener("scroll",this.detectScroll,{passive:!0}),document.removeEventListener("resize",this.detectScroll,{passive:!0})},methods:{detectScroll:function(){this.scrollTop=document.scrollingElement.scrollTop},resetAnimation:function(){e.carOffset=0,e.fromOffset=0,e.targetOffset=0,e.targetNodeIndex=0,e.timeline.forEach((function(line){return line.actived=!1})),e.timeline[0].actived=!0}},render:function(t){var n,l=e.guidelines.map((function(line){var n,r,l;return t("div",{key:line.id,class:(r={},Object(o.a)(r,"".concat("guide-line","__item"),!0),Object(o.a)(r,"".concat("guide-line","__item--active"),null==line||null===(n=line.point)||void 0===n?void 0:n.actived),r),style:line.style},[t("div",{class:"".concat("guide-line","__label")},"".concat(line.label," (").concat((null==line||null===(l=line.point)||void 0===l?void 0:l.offset)-e.baseOffset,")"))])})),c=t("div",{key:"trigger-line",class:(n={},Object(o.a)(n,"".concat("guide-line","__item"),!0),Object(o.a)(n,"".concat("guide-line","__trigger"),!0),n),style:{top:e.triggerOffset+"px"}},[t("div",{class:"".concat("guide-line","__label ").concat("guide-line","__label--debug"),on:{click:this.resetAnimation}},["car: ".concat(e.carOffset.toFixed(2)," | ").concat(e.fromOffset.toFixed(2)," -> ").concat(e.targetOffset.toFixed(2)),t("br"),"node: ".concat(e.targetNodeIndex)]),t("div",{class:"".concat("guide-line","__label")},"trigger line (".concat((this.scrollTop-e.baseOffset+e.triggerOffset).toFixed(2),")"))]);return t("div",{class:"guide-line"},[].concat(Object(r.a)(l),[c]))}});var t=document.createElement("div");document.body.appendChild(t),m.$mount(t)}},moveCarTo:function(){this.carOffset>=this.targetOffset||(null!==f&&(window.cancelAnimationFrame(f),f=null),h=null,this.fromOffset=this.carOffset,window.requestAnimationFrame(this.moveCar))},moveCar:function(time){var e=this;null===h&&(h=time),f=null;var t=time-h,n=Math.sign(this.targetOffset-this.fromOffset),r=t/1e3*300*n,o=this.fromOffset+r,l=Math.sign(this.targetOffset-o)!==n;this.carOffset=l?this.targetOffset:o,this.timeline.filter((function(e){return!e.actived})).forEach((function(t){t.actived=e.carOffset>=t.offset})),f=l?null:window.requestAnimationFrame(this.moveCar)},gotoCarList:function(){window.location.href=this.$router.resolve({name:"seoList"}).href}}},k=(n(1414),n(18)),v=n(1415),y=n(1416),w=n(1417),C=n(20),x=n.n(C),S=n(299),component=Object(k.a)(_,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"page-about-us"},[r("header",{staticClass:"page-header"},[r("h1",{staticClass:"page-header__title"},[e._v(e._s(e.$t("text.about_us.title")))])]),e._v(" "),r("section",{staticClass:"box block block--who-we-are"},[r("h2",{staticClass:"box__title"},[e._v(e._s(e.$t("text.who_we_are.title")))]),e._v(" "),r("div",{staticClass:"box__content box__content--float-left",domProps:{innerHTML:e._s(e.$t("text.who_we_are.content"))}})]),e._v(" "),r("section",{staticClass:"block block--our-vision"},[r("h3",{staticClass:"block__title"},[e._v(e._s(e.$t("text.our_vision.title")))]),e._v(" "),r("p",{staticClass:"block__content"},[e._v(e._s(e.$t("text.our_vision.content")))])]),e._v(" "),r("section",{staticClass:"box block block--what-we-do"},[r("h2",{staticClass:"box__title"},[e._v(e._s(e.$t("text.what_we_do.title")))]),e._v(" "),r("picture",{staticClass:"box__content box__content--image image box__content--float-right"},[r("source",{attrs:{media:"(max-width: 900px)",srcset:n(978)+" 2x, "+n(979)}}),e._v(" "),r("img",{staticClass:"image__content",attrs:{src:n(980),alt:e.$t("text.what_we_do.image_1")}})]),e._v(" "),r("div",{staticClass:"box__content box__content--float-left",domProps:{innerHTML:e._s(e.$t("text.what_we_do.content_1"))}}),e._v(" "),r("div",{staticClass:"box__content box__content--clear"}),e._v(" "),r("figure",{staticClass:"box__content box__content--image image box__content--float-left",class:e.$te("text.what_we_do.image_2_desc")?"image--with-caption":""},[r("picture",[r("source",{attrs:{media:"(max-width: 900px)",srcset:n(981)+" 2x, "+n(982)}}),e._v(" "),r("img",{staticClass:"image__content",attrs:{src:n(983),alt:e.$t("text.what_we_do.image_2")}})]),e._v(" "),e.$te("text.what_we_do.image_2_desc")?r("figcaption",{staticClass:"image__caption"},[e._v("\n        "+e._s(e.$t("text.what_we_do.image_2_desc"))+"\n      ")]):e._e()]),e._v(" "),r("div",{staticClass:"box__content box__content--float-right",domProps:{innerHTML:e._s(e.$t("text.what_we_do.content_2"))}})]),e._v(" "),r("section",{staticClass:"box block block--available-country"},[r("h3",{staticClass:"block__title"},[e._v(e._s(e.$t("text.available_country.title")))]),e._v(" "),e._m(0),e._v(" "),r("p",{staticClass:"block__content"},[e._v(e._s(e.$t("text.available_country.content")))])]),e._v(" "),r("section",{staticClass:"box block block--statistics"},[r("ul",{staticClass:"block__content"},[r("li",[r("i",{staticClass:"icon icon-user"}),r("span",{domProps:{innerHTML:e._s(e.$t("text.statistics.dealers"))}})]),e._v(" "),r("li",[r("i",{staticClass:"icon icon-car"}),r("span",{domProps:{innerHTML:e._s(e.$t("text.statistics.cars"))}})]),e._v(" "),r("li",[r("i",{staticClass:"icon icon-hammer"}),r("span",{domProps:{innerHTML:e._s(e.$t("text.statistics.bids"))}})])])]),e._v(" "),r("section",{staticClass:"box block block--our-journey"},[r("h2",{staticClass:"block__title"},[e._v(e._s(e.$t("text.our_journey.title")))]),e._v(" "),r("ol",{ref:"timeline",staticClass:"timeline"},[r("li",{staticClass:"timeline__car",style:{transform:"translateY("+e.carOffset+"px)"}}),e._v(" "),e._l(e.timeline,(function(t){return r("li",{key:t.year,staticClass:"timeline__item",class:{"timeline__item--actived":t.actived}},[r("div",{staticClass:"timeline__year"},[e._v(e._s(t.year))]),e._v(" "),e._l(t.events,(function(t,n){return r("ul",{key:n,staticClass:"timeline__event-list"},[r("li",{staticClass:"timeline__event"},[e._v(e._s(t))])])}))],2)}))],2)]),e._v(" "),r("section",{staticClass:"box block block--start-here"},[r("h3",{staticClass:"block__title"},[e._v(e._s(e.$t("text.ready_to_start.title")))]),e._v(" "),r("div",{staticClass:"block__content"},[e._v(e._s(e.$t("text.ready_to_start.content")))]),e._v(" "),r("div",{staticClass:"block__action"},[r("v-btn",{attrs:{depressed:""},on:{click:function(t){return e.gotoCarList()}}},[e._v(e._s(e.$t("text.ready_to_start.buy_car")))]),e._v(" "),r("v-btn",{attrs:{depressed:"",href:e.getSellCarPath}},[e._v(e._s(e.$t("text.ready_to_start.sell_car")))])],1)])])}),[function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"country-list"},[t("strong",[this._v("Malaysia")]),this._v(" | "),t("strong",[this._v("Indonesia")]),this._v(" | "),t("strong",[this._v("Thailand")]),this._v(" | "),t("strong",[this._v("Singapore")])])}],!1,null,null,null);"function"==typeof v.default&&Object(v.default)(component),"function"==typeof y.default&&Object(y.default)(component),"function"==typeof w.default&&Object(w.default)(component);t.default=component.exports;x()(component,{Header:n(330).default}),x()(component,{VBtn:S.a})},978:function(e,t,n){e.exports=n.p+"img/image-2-w900@2x.32484be.jpg"},979:function(e,t,n){e.exports=n.p+"img/image-2-w900.570c572.jpg"},980:function(e,t,n){e.exports=n.p+"img/image-2.f8661c4.jpg"},981:function(e,t,n){e.exports=n.p+"img/image-3-w900@2x.6debde4.jpg"},982:function(e,t,n){e.exports=n.p+"img/image-3-w900.a7d6123.jpg"},983:function(e,t,n){e.exports=n.p+"img/image-3.8515540.jpg"},984:function(e,t){e.exports=function(e){e.options.__i18n=e.options.__i18n||[],e.options.__i18n.push('{"MY":{"meta":{"title":"About Carsome | Sell and Buy Used Cars","description":"Carsome is Southeast Asia\'s largest online used car trading platform with presence in Malaysia, Indonesia, Thailand and Singapore. Buy used cars and sell used cars easily at the best price at Carsome.","keywords":"Sell used car, online used car dealer, Best Price used car Malaysia"},"timeline":{"2015":["Carsome was founded in Malaysia with US$350,000 seed funding."],"2016":["Carsome Singapore commenced business.","Raised US$2million in Series A funding.","Passed the mark of 1,000 cars transacted annually."],"2017":["Carsome expanded to Indonesia and Thailand.","Raised US$6million in Series A2 funding."],"2018":["Raised US$19 million in Series B and US$8 million in Series B2 funding.","Passed the mark of 10,000 cars transacted annually.","Awarded the ‘Startup of the Year’ by the Malaysian Rice Bowl Startup Awards."],"2019":["Established Carsome Capital.","Announced partnership with Funding Societies Malaysia.","Raised US$50 million in Series C funding.","Passed the mark of 40,000 cars transacted annually."],"2020":["Launched ‘The New Way of Buying Cars’ in Malaysia.","Became the first platform to sell used cars on Shopee.","Announced various partnerships with Allianz Partners Malaysia and CIMB Bank.","Celebrated 100,000th seller.","Raised US$30 million in Series D funding."],"2021":["Set up Carsome Academy, which was subsequently appointed as JPK’s RPA Accredited Center.","Entered motorsports sponsorship through Thailand Super Series.","Set up Data Center of Excellence.","Announced various partnerships with Aspirasi (Malaysia), CKL Group (Malaysia) and Muang Thai Insurance, gettgo (Thailand).","Acquired equity stake in PT Universal Collection (Indonesia).","Ranked in Top 50 of the Nikkei-FT-Statista High-Growth Companies Asia-Pacific 2021 list."]},"text":{"about_us":{"title":"About Us","image":"Carsome’s top management team group photo at the lobby"},"who_we_are":{"title":"Who We Are","content":"<p>Carsome is Southeast Asia’s largest integrated car e-commerce platform. With presence across Malaysia, Indonesia, Thailand and Singapore, we aim to digitalize the region’s used car industry by reshaping and elevating the car buying and selling experience.</p> <p>Carsome provides end-to-end solutions to consumers and used car dealers, from car inspection to ownership transfer to financing, promising a service that is trusted, convenient and efficient.</p>","image":"Cars lined up with Carsome’s submark"},"our_vision":{"title":"Our Vision","content":"To drive Southeast Asia’s automotive industry forward in the used car ecosystem"},"what_we_do":{"title":"What We Do","image_1":"Happy customer showing thumbs up from the frontseat of a car","content_1":"<p>We first started as a used car selling platform where we help customers sell their used cars through a trusted, convenient and fast process.</p> <p>This simple process starts with booking an appointment online. Our extensive 175-point inspection process is free and takes only 30 minutes at a Carsome Inspection Center.</p> <p>Our highly-trained inspectors are well-equipped to provide a complete car condition report before an on-the-spot offer is given. Alternatively, customers can proceed with bidding where our network of dealers will have the chance to place a bid. After the sale is confirmed, all paperwork will be handled by us.</p> <p>From car inspection, ownership transfer, to easy financing, selling a car becomes hassle-free. Carsome eliminates the pain points in the traditional used car selling process, offering effective solutions to consumers and used car dealers.</p>","image_2":"Founders holding carsome buy car signages with a car wrapped in blue ribbon in between","image_2_desc":null,"content_2":"<p>In August 2020, we launched ‘The New Way of Buying Cars’, a brand new service that offers consumers a seamless car buying experience. </p> <p>Enter www.carsome.my, click on the Buy Car tab, and consumers can browse for their dream cars to fit their lifestyle. All Carsome Certified cars have a 360-degree view of the car’s interior and exterior, a list of the current imperfections, a professional reconditioning report, as well as a fixed price with no hidden fees. Booking a test drive can be easily done anytime and anywhere on the website.</p> <p>To give consumers quality assurance and peace of mind, all Carsome Certified cars come with the Carsome Promise, which includes a 5-day money-back guarantee, a professional 175-point car inspection, a 1-year warranty, and fixed price with no hidden fees.</p>"},"available_country":{"title":"Carsome is currently in:","content":"With 50+ Carsome centers across 50+ cities"},"statistics":{"dealers":"<strong>8,000+</strong> dealers","cars":"<strong>100,000</strong> cars sold annually","bids":"<strong>4,400,000</strong> total bids"},"our_journey":{"title":"Our Journey"},"ready_to_start":{"title":"Ready to Start?","content":"Whether it’s selling your used car or buying your next ride, we can do it all.","buy_car":"Buy A Car","sell_car":"Sell Your Car"}}}}'),delete e.options._Ctor}},985:function(e,t){e.exports=function(e){e.options.__i18n=e.options.__i18n||[],e.options.__i18n.push('{"ID":{"meta":{"title":"Tentang Kami | Carsome","description":"Carsome Indonesia memberikan pelayanan yang mudah, cepat dan transparan untuk menjual mobil bekas anda.","keywords":"Jual mobil bekas, Jual mobil bekas Jakarta, Jual mobil bekas Surabaya, Jual mobil bekas Jawa Barat Jual mobil bekas Medan"},"timeline":{"2015":["Carsome didirikan di Malaysia dengan pendanaan awal sebesar 350 Ribu US Dollar"],"2016":["Carsome Singapore memulai bisnisnya.","Mendapatkan 2 juta US Dollar dalam pendanaan Seri A.","Telah berhasil ditransaksikan 1.000 mobil setiap tahun."],"2017":["Carsome berkembang ke Indonesia dan Thailand.","Mengumpulkan 6 juta US dollar dalam pendanaan Seri A2."],"2018":["Mendapatkan 19 juta US Dollar dalam pendanaan Seri B dan 8 juta US Dollar dalam pendanaan Seri B2.","Berhasil melewati 10.000 mobil yang ditransaksikan setiap tahun.","Berhasil dianugerahi \'Startup of the Year\' oleh Malaysian Rice Bowl Startup Awards."],"2019":["Mendirikan Carsome Capital.","Mengumumkan kemitraan dengan Funding Societies Malaysia.","Mendapatkan 50 juta US Dollar dalam pendanaan Seri C.","Berhasil melewati 40.000 mobil yang ditransaksikan setiap tahun."],"2020":["Meluncurkan “Cara Baru Membeli Mobil” di Malaysia.","Menjadi platform pertama yang menjual mobil bekas di Shopee.","Mengumumkan kemitraan dengan Bank CIMB dan Allianz Partners Malaysia .","Merayakan penjualan ke 100.000.","Mendapatkan 30 Juta US Dollar dalam pendanaan Seri D."],"2021":["Mendirikan Carsome Academy, yang kemudian ditunjuk sebagai Pusat Terakreditasi RPA JPK.","Mengambil bagian dalam dunia motorsport melalui Thailand Super Series.","Membangun Data Center of Excellence.","Mengumumkan beberapa kemitraan dengan Aspirasi (Malaysia), CKL Group (Malaysia) dan Muang Thai Insurance, getfgo (Thailand).","Mengakuisisi kepemilikan di PT Universal Collection (Indonesia)","Masuk ke dalam daftar 50 perusahaan teratas dalam Nikkei-FT-Statista High Growth Companies Asia-Pacific 2021.","Menjadi Exclusive Car Trading Partner untuk pertama kalinya di Indonesia Modification Expo 2021."]},"text":{"about_us":{"title":"Tentang Kami","image":"Foto grup tim manajemen Carsome di lobi"},"who_we_are":{"title":"Siapa kami","content":"<p>Carsome adalah platform jual beli mobil bekas online terbesar di Asia Tenggara yang saat ini hadir di Malaysia, Indonesia, Thailand dan Singapura. Perusahaan ini memiliki misi untuk membawa industri mobil bekas ke era digital dengan membangun dan mengangkat pengalaman dalam menjual dan membeli mobil.</p> <p>Carsome menyediakan solusi terlengkap untuk pembeli dan penjual mobil bekas, mulai dari <strong>inspeksi mobil, mutasi kepemilikan hingga pembiayaan</strong>, menjanjikan pelayanan yang <strong>Terpercaya, Mudah dan Cepat</strong>.</p>","image":"Mobil berbaris dengan sub-merek Carsome"},"our_vision":{"title":"Visi kami","content":"Memajukan industri otomotif di Asia Tenggara dalam ekosistem mobil bekas"},"what_we_do":{"title":"Layanan Kami","image_1":"Pelanggan yang senang dan puas di kursi depan mobil","content_1":"<p>Kami memulai pertama kali sebagai platform penjualan mobil bekas, dimana kami membantu pelanggan menjual mobil bekas mereka melalui proses yang Terpercaya, Mudah, dan Cepat. </p> <p>Proses sederhana ini dimulai dengan menjadwalkan inspeksi gratis secara online. Proses inspeksi kami di <strong>175 titik inspeksi yang ekstensif secara gratis</strong> dan hanya membutuhkan waktu 30 menit di Inspection Center Carsome.</p> <p>Inspektor profesional kami siap untuk memberikan laporan kondisi mobil yang lengkap sebelum memberikan penawaran di tempat. Sebagai alternatif, pelanggan dapat melanjutkan penawaran dimana jaringan dealer terverifikasi kami memiliki kesempatan untuk mengajukan penawaran. Setelah transaksi disepakati, <strong>semua urusan dokumen penjualan akan kami tangani.</strong></p> <p>Mulai dari <strong>inspeksi mobil, mutasi kepemilikan, hingga kemudahan pembiayaan</strong>, menjual mobil menjadi sangat mudah Carsome menghilangkan kesulitan dalam proses penjualan mobil bekas secara tradisional, menawarkan solusi efektif kepada konsumen dan dealer mobil bekas.</p>","image_2":"Para pendiri yang memegang mobil papan nama mobil dengan mobil yang dibungkus pita biru di antaranya","image_2_desc":null,"content_2":"<p>Pada bulan April 2021, kami meluncurkan cara baru membeli mobil, layanan baru yang menawarkan pengalaman membeli mobil yang mudah kepada konsumen di Indonesia. </p> <p>Masuk ke www.carsome.id, klik tab Beli Mobil, dan konsumen dapat mencari mobil impian mereka yang sesuai dengan gaya hidup mereka. Semua mobil yang terdaftar memiliki tampilan <strong>360 derajat dari interior dan eksterior mobil</strong>, daftar kondisi unit mobil saat ini, laporan rekondisi profesional, serta harga yang mencakup semua. Membuat janji <strong>test drive dapat dilakukan dengan mudah, kapanpun dan dimanapun</strong> melalui website, sebelum menuju ke Carsome Experience Center untuk melakukan test drive.   </p> <p>Untuk memberikan rasa tenang dan nyaman kepada konsumen, semua mobil Carsome Certified didukung dengan Carsome Promise yang artinya telah melewati pemeriksaan di 175 titik inspeksi oleh Carsome, layanan garansi selama satu tahun dan jaminan uang kembali selama lima hari, serta harga yang diberikan adalah harga pasti tanpa ada biaya tersembunyi.</p>"},"available_country":{"title":"Carsome saat ini tersedia di:","content":"Tersebar di lebih dari 50+ Carsome Center di lebih dari 50 kota."},"statistics":{"dealers":"<strong>8,000+</strong> dealer","cars":"<strong>40.000</strong> mobil terjual setiap tahun","bids":"<strong>2.300.000</strong> total tawaran","worth":"Total mobil yang terjual senilai <strong>600juta US Dollar</strong>"},"our_journey":{"title":"Perjalanan kami"},"ready_to_start":{"title":"Siap untuk menjual?","content":"Baik untuk menjual mobil bekas Anda atau membeli kendaraan Anda berikutnya, kami dapat melakukan semuanya.","buy_car":"Beli Mobil","sell_car":"Jual mobil Anda"}}}}'),delete e.options._Ctor}},986:function(e,t){e.exports=function(e){e.options.__i18n=e.options.__i18n||[],e.options.__i18n.push('{"TH":{"meta":{"title":"เราช่วยคุณขายรถได้ง่าย สะดวก และรวดเร็ว | Carsome","description":"Carsome คือเว็บไซต์รับซื้อรถและบริการช่วยขายรถมือสองผ่านระบบการประมูลรถยนต์ออนไลน์แห่งแรกในประเทศไทย และเป็นแพลตฟอร์มที่ใหญ่ที่สุดในภูมิภาคเอเชียตะวันออกเฉียงใต้","keywords":"รับซื้อรถยนต์, รับซื้อรถยนต์ราคาสูง, ขายรถมือสองวันนี้, เว็บขายรถยนต์, เว็บซื้อขายรถมือสอง"},"timeline":{"2015":["Carsome ก่อตั้งที่ประเทศมาเลเซียด้วยทุน 350,000 เหรียญดอลลาร์สหรัฐ"],"2016":["Carome Singapore เปิดกิจการ","ระดมทุน Series A ได้ถึง 2 ล้านเหรียญดอลลาร์สหรัฐ","ทำธุรกรรมกับรถยนต์ถึง 1,000 คันในหนึ่งปี"],"2017":["Carsome ขยายสาขาไปยังประเทศอินโดนีเซีย และไทย","ระดมทุน Series A2 ได้ถึง 6 ล้านเหรียญดอลลาร์สหรัฐ"],"2018":["ระดมทุน Series B ได้ 19 ล้านเหรีนญดอลลาร์สหรัฐ และ Series B2 ได้ที่ 8 ล้านเหรียญดอลลาร์สหรัฐ","ทำธุรกรรมผ่านรถยนต์ 10,000 คันต่อปี","ได้รางวัล \\"Startup of the Year\\" ที่งาน Rice Bowl Startup Awards ในประเทศมาเลเซีย"],"2019":["ก่อตั้ง Carsome สาขาหลัก","ร่วมเป็นพันธมิตรกับ Funding Societies ประเทศมาเลเซีย","ระดมทุน Series C ได้ถึง 50 ล้านเหรียญดอลลาร์สหรัฐ","ทำธุรกรรมผ่านรถยนต์ถึง 40,000 คันต่อปี"],"2020":["เปิดตัว ‘วิถีการซื้อรถรูปแบบใหม่’ ในประเทศมาเลเซีย","เป็นผู้ให้บริการขายรถมือสองรายแรกที่เปิดให้บริการบน Shopee","ร่วมเป็นพันธมิตรกับ Allianz Partners Malaysia และ ธนาคาร CIMB","ฉลองความสำเร็จ มีผู้ไว้วางใจมาขายรถกับเรามากถึง 100,000 ราย","ระดมทุน Series D ได้ถึง 30 ล้านเหรียญดอลลาร์สหรัฐ"],"2021":["ก่อตั้ง Carsome Academy ซึ่งต่อมาได้รับการรับรองมาตรฐานโดยกระทรวงพัฒนาทักษะแรงงานในประเทศมาเลเซีย (JPK)","ร่วมสนับสนุนกีฬามอเตอร์สปอร์ต ไทยแลนด์ ซูเปอร์ ซีรีส์","ก่อตั้งศูนย์ความเป็นเลิศทางข้อมูล (Data Center of Excellence)","ประกาศร่วมมือกับพันธมิตรมากมาย อาทิ Aspirasi (Malaysia), CKL Group (Malaysia), เมืองไทยประกันภัย และ Gettgo ประเทศไทย","ขยายกิจการผ่านการลงทุนกับ PT Universal Collection ในประเทศอินโดนีเซีย","ได้รับการจัดอันดับเป็น 1 ใน 50 บริษัทที่มีการเติบโตสูงที่สุดในภูมิภาคเอเชียแปซิฟิคในปี 2021 (Nikkei-FT-Statista High-Growth Companies Asia-Pacific 2021)"]},"text":{"about_us":{"title":"เกี่ยวกับเรา","image":"ภาพทีมผู้บริหารระดับสูงของ Carsome ที่ล็อบบี้"},"who_we_are":{"title":"เราคือใคร","content":"<p>Carsome คือแพลตฟอร์มซื้อ-ขายรถยนต์มือสองออนไลน์ที่ใหญ่ที่สุดในเอเชียตะวันออกเฉียงใต้ </p> <p>ปัจจุบันมีสาขาอยู่ที่ประเทศมาเลเซีย, อินโดนีเซีย, ไทย และ สิงคโปร์ โดยมีจุดมุ่งหมายเพื่อเปลี่ยนแปลงอุตสาหกรรมรถยนต์มือสองในภูมิภาคให้เป็นดิจิทัล โดยการปรับโฉมและยกระดับประสบการณ์ในการซื้อและขายรถยนต์ </p> <p>Carsome นำเสนอบริการแบบครบวงจรตั้งแต่ต้นจนจบสำหรับลูกค้า และดีลเลอร์รถยนต์มือสองทุกราย ตั้งแต่<strong>การตรวจสภาพรถยนต์, การโอนกรรมสิทธิ์ ไปจนถึงบริการทางด้านสินเชื่อ</strong> เพื่อมอบประสบการณ์ที่<strong>น่าเชื่อถือ, สะดวก, และรวดเร็ว</strong> </p>","image":"รถจัดแนวตามสัญลักษณ์รองของ Carsome"},"our_vision":{"title":"วิสัยทัศน์ของเรา","content":"เราต้องการขับเคลื่อนการหมุนเวียนรถยนต์มือสอง ในอุตสาหกรรมยานยนต์มือสองของเอเชียตะวันออกเฉียงใต้"},"what_we_do":{"title":"บริการของเรา","image_1":"ลูกค้ายกนิ้วชื่นชม บนเบาะหน้ารถยนต์","content_1":"<p>Carsome เริ่มต้นในฐานะแพลตฟอร์มที่ช่วยลูกค้าขายรถมือสอง ด้วยขั้นตอนที่เชื่อถือได้ สะดวกสบาย และรวดเร็ว </p> <p>ขั้นตอนที่เรียบง่ายของเราเริ่มจากการรับลงทะเบียนนัดหมายออนไลน์ ตรวจสภาพรถยนต์กว่า 175 จุดแบบไม่คิดค่าใช้จ่าย โดยใช้เวลาเพียง 30 นาที ที่ศูนย์ตรวจสภาพรถยนต์ของ Carsome </p> <p>เรามีช่างตรวจสภาพรถยนต์ผู้เชี่ยวชาญที่ได้รับการอบรมมาอย่างดี เพื่อรายงานสภาพรถยนต์ก่อนจะทำการเสนอซื้อทันที หรือ หากลูกค้าต้องการส่งรถเข้าประมูล เราก็มีเครือข่ายดีลเลอร์ที่เชื่อถือได้พร้อมร่วมประมูลและให้ราคาที่ดีที่สุด หลังจากปิดการขาย ลูกค้าไม่ต้องยุ่งยากเรื่องเอกสาร เราจะจัดการให้ทั้งหมด</p> <p>ขั้นตอนทั้งหมดเริ่มจาก การตรวจสภาพรถยนต์ การโอนกรรมสิทธิ์ และบริการทางการเงิน เราเปลี่ยนการขายรถเดิมๆ ที่ยุ่งยาก วุ่นวาย ให้เป็นเรื่องง่ายสำหรับลูกค้าและดีลเลอร์รถมือสอง</p>","image_2":"ผู้ก่อตั้งชูป้ายขายแล้วของ Carsome พร้อมรถผูกโบน้ำเงินคั่นกลาง","image_2_desc":null,"content_2":"<p>ในเดือนมีนาคม ปี 2021 Carsome ประเทศไทย ได้เปิดตัว ‘วิถีการซื้อรถรูปแบบใหม่’ ที่ให้ประสบการณ์การซื้อรถมือสองที่สะดวกและง่ายดาย </p> <p>เข้าสู่เว็บไซต์ www.carsome.co.th คลิกไปที่ปุ่ม ซื้อรถ ก็จะมีรถที่เหมาะกับไลฟ์สไตล์ของผู้บริโภคที่แตกต่างกันให้เลือกซื้อ รถทุกคันมาพร้อมมุมมองแบบ 360 องศา ทั้งในห้องโดยสาร และภายนอกทั้งหมด โดยจะแสดงจุดสังเกตและการซ่อมแซม รวมถึงราคาเบ็ดเสร็จของรถที่ไม่มีค่าใช้จ่ายแอบแฝงอื่นๆ สามารถลงทะเบียนทดลองขับได้ง่ายๆ ทุกที่ ทุกเวลา บนเว็บไซต์ ก่อนจะเดินทางไปทดลองขับจริงที่ศูนย์บริการ Carsome หรือนัดให้ส่งรถมาทดลองขับที่บ้านก็ทำได้</p> <p>เพื่อความสบายใจของลูกค้าผู้ใช้บริการ รถทั้งหมดของ Carsome นั้นผ่านการรับรองการตรวจสภาพถึง 175 จุด ซึ่งถือเป็นจุดขายของ Carsome โดยลูกค้าสามารถมั่นใจได้ว่ารถยนต์ของเราไม่เคยประสบอุบัติเหตุหนักจนโครงสร้างเสียหาย และไม่เคยผ่านน้ำท่วม </p> <p>รถยนต์ของ Carsome ยังมาพร้อมกับการรับประกันถึง 1 ปีเต็ม และการการันตีคืนเงินภายใน 5 วัน ภายใต้โปรแกรม “คำสัญญาจาก Carsome” เพื่อลูกค้าทุกท่าน ซึ่งถือเป็นครั้งแรกของตลาดยานยนต์มือสอง</p>"},"available_country":{"title":"ตอนนี้ Carsome มีสาขาอยู่ที่:","content":"มีศูนย์บริการ Carsome มากกว่า 50 แห่ง ในกว่า 50 เมือง"},"statistics":{"dealers":"<strong>8,000+</strong> ดีลเลอร์","cars":"มีการขายรถยนต์กว่า <strong>40,000</strong> คันต่อปี","bids":"มีการประมูลทั้งหมด <strong>2,300,000</strong> ครั้ง","worth":"รวมมูลค่าของรถยนต์ที่ขายได้ถึง <strong>600 ล้านเหรียญสหรัฐ</strong>"},"our_journey":{"title":"การเดินทางของเรา"},"ready_to_start":{"title":"พร้อมเริ่มหรือยัง?","content":"ไม่ว่าคุณจะต้องการขายรถคันเดิม หรือกำลังหาซื้อรถมือสอง เราก็จัดการให้คุณได้","buy_car":"ซื้อรถ","sell_car":"ขายรถ"}}}}'),delete e.options._Ctor}}}]);