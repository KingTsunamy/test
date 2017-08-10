<?php
include_once('../../simple_html_dom.php');

$context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
$response = file_get_contents('http://imdb.com/title/tt0335266/', false, $context);
$html = str_get_html($response);
echo $html;

function scraping_IMDB($url) {
    // create HTML DOM
    $html = file_get_html(urlencode($url));
	if(!$html){
		echo 'shit';
	}
    // get title
    $ret['Title'] = $html->find('title', 0)->innertext;

    // get rating
    $ret['Rating'] = $html->find('div[class="general rating"] b', 0)->innertext;

    // get overview
    foreach($html->find('div[class="info"]') as $div) {
        // skip user comments
        if($div->find('h5', 0)->innertext=='User Comments:')
            return $ret;

        $key = '';
        $val = '';

        foreach($div->find('*') as $node) {
            if ($node->tag=='h5')
                $key = $node->plaintext;

            if ($node->tag=='a' && $node->plaintext!='more')
                $val .= trim(str_replace("\n", '', $node->plaintext));

            if ($node->tag=='text')
                $val .= trim(str_replace("\n", '', $node->plaintext));
        }

        $ret[$key] = $val;
    }
    
    // clean up memory
    $html->clear();
    unset($html);

    return $ret;
}


// -----------------------------------------------------------------------------
// test it!
$ret = scraping_IMDB('http://imdb.com/title/tt0335266/');

foreach($ret as $k=>$v)
    echo '<strong>'.$k.' </strong>'.$v.'<br>';
?>