<?php
class SkinLibertyZeta extends SkinTemplate {

	public $skinname = 'libertyzeta';
	public $stylename = 'LibertyZeta';
	public $template = 'LibertyZetaTemplate';

    public function initPage( OutputPage $out ) {
        parent::initPage( $out );
        $out->addMeta( 'viewport', 'width=device-width, initial-scale=1, maximum-scale=1' );
        $out->addMeta( 'description', 'zetawiki' );
        $out->addMeta( 'keywords', 'wiki,zetawiki,제타위키,제타 위키,' . $this->getSkin()->getTitle() );
		
		/* 네이버 웹마스터 도구 */
		$out->addMeta('naver-site-verification', '0b20790abdd5720e293968109acb489744366ae9');
		
		/* IOS 기기 및 모바일 크롬에서의 웹앱 옵션 켜기 및 상단바 투명화 */
		$out->addMeta('apple-mobile-web-app-capable', 'Yes');
		$out->addMeta('apple-mobile-web-app-status-bar-style', 'black-translucent');
		$out->addMeta('mobile-web-app-capable', 'Yes');
		
		/* 모바일에서의 테마 컬러 적용 */
		//크롬, 파이어폭스 OS, 오페라
		$out->addMeta('theme-color', '#4188F1');
		//윈도우 폰
		$out->addMeta('msapplication-navbutton-color', '#4188F1'); 
		
		/* OpenGraph */
		$out->addMeta('og:image','https://zetawiki.net/images/6/6a/Zeta_favicon.png' );
		$out->addMeta('og:locale', 'ko_KR' );

		
		/* 트위터 카드 */
		$out->addMeta('twitter:card', 'summary');
		$out->addMeta('twitter:site', '@zetawiki');
		$out->addMeta('twitter:title', $this->getSkin()->getTitle() );
		$out->addMeta('twitter:description', strip_tags(preg_replace('/<table[^>]*>([\s\S]*?)<\/table[^>]*>/', '', $out->mBodytext)),'<br>');
		$out->addMeta('twitter:creator', '@zetawiki');
		$out->addMeta('twitter:image', 'https://zetawiki.net/images/6/6a/Zeta_favicon.png');
		
		
		
        $out->addModuleScripts( array(
            'skins.libertyzeta.bootstrap'
        ) );
        $out->addModuleScripts( array(
            'skins.libertyzeta.layoutjs'
        ) );
    }

	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
 	        $out->addHeadItem( 'font-awesome', '<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" />' );
	        $out->addHeadItem( 'google-ads', '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>' );
		$out->addModuleStyles( array(
			'skins.libertyzeta.styles'
		) );
	}
	function addToBodyAttributes( $out, &$bodyAttrs ) {
        $bodyAttrs['class'] .= " LibertyZeta width-size";
    }
}
