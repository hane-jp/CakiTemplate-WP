//--------------------- base ---------------------//

//Babelで変換したコードを利用する場合に必要なポリフィル
import "babel-polyfill"

//pointerEventsを利用する場合に必要なポリフィル
// import 'pepjs'

//IntersectionObserverを利用する場合に必要なポリフィル
// import 'intersection-observer'

//Web Animations APIをフルで利用する場合に必要なポリフィル
// import 'web-animations-js'

//jqueryをグローバル化する場合は、以下をコメントアウトを解除
//window.$ = window.jQuery = $

//ページごとのJS動作制限のためにbodyのclassListを取得
const bodyClass = document.querySelector('body').classList

//---------------------slider関連

import swiper_config from './base/_swiper/__config.js'
swiper_config()

//---------------------scroll-animation関連

import inview_config from './base/_inview/__config.js'
inview_config()

//---------------------ライトボックス・モーダル関連

import magPopup_config from  "./base/_mag-popup/__config.js"
if(bodyClass.contains('.mfp-btn')){
  magPopup_config()
}

//---------------------スムーズスクロール関連

import smoothScroll_config from  "./base/_smooth-scroll/__config.js"
smoothScroll_config()

//---------------------画像遅延読込み関連

import layzr_config from './base/_layzr/__config.js'
layzr_config()

//---------------------プログレッシブフレームワーク

import vue_config from './base/_vue/__config.js'
if(bodyClass.contains('vue')){
  vue_config()
}

//---------------------csv

import csv_config from './base/_csv/__config.js'
if(bodyClass.contains('_csv')){
  csv_config()
}

//---------------------その他

import * as webAnimations_config from './base/_web-animations/__config.js'
import * as animations_config from './base/_web-animations/__sample.js'
if(bodyClass.contains('_web-animations')){
  webAnimations_config.caniuse()
  webAnimations_config.caniuse_polyfill()
  webAnimations_config.sample1()
  animations_config.sampleX()
  animations_config.sampleY()
  animations_config.sampleXY()
  animations_config.sampleR()
  animations_config.sampleTest()
}

import * as mutationObserver_config from './base/_mutation-observer/__config.js'
if(bodyClass.contains('_mutation-observer')){
  mutationObserver_config.caniuse()
  mutationObserver_config.caniuse_polyfill()
  mutationObserver_config.sample1()
  mutationObserver_config.sample2()
}

//--------------------- common ---------------------//

import menubarFn from './common/_header/__menubar.js'
menubarFn()

import gnavDeepFn from './common/_header/__gnav-deep.js'
gnavDeepFn()

//タッチホバーイベント
import touchevents_config from './common/_unit/_touch-events/__config.js'
touchevents_config()

//ページトップへボタンのフェード
import pagetop_config from './common/_unit/_pagetop/__config.js'
pagetop_config()

//--------------------- page ---------------------//

//home
import mainV_config from './page/_home/__main-v.js'
import './page/_home/__main-v.scss'
if(bodyClass.contains('_etc')){
  mainV_config()
}

//PointerEventsのサンプル
import pointerEvents_config from './page/_pointer-events/__config.js'
if(bodyClass.contains('_pointer-events')){
  pointerEvents_config()
}
