<?php
/*
 * MODx Evolution
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * strWordCount
 * Copyright 2011 by Artdevue.com  <info@artdevue.com>
 * Sentences on an e-mail: info@artdevue.com
 * The author: Valentine Rasulov
 * A dynamic form processing Snippet for MODx Revolution 2.0.
 * @package strWordCount
 *
 *
 * Snippet strWordCount is intended for wrapping in a span tag words in the pagetitle
 * For example: pagetitle = Offering Comprehensive Projects
 * A simple by default call filter 
 * [!strWordCount? &input=`[+pagetitle+]`!]
 * At the output we get <span>Offering</span> Comprehensive Projects
 *
 * The available options
 *  [!strWordCount? &input=`[+pagetitle+]` &options=`2,1`!] 2 - Serial number of words and 1 - The number of spaces after a span tag.
 * At the output we get Offering <span>Comprehensive</span> Projects
 *
 * [!strWordCount? &input=`[+pagetitle+]` &options=`1`!] If you omit the second parameter is equal to 0
 * At the output we get <span>Offering</span>Comprehensive Projects
 * 
 */
$pozword = 0;
$space = 1;
$output = '';
if(!empty($options)){
  $ww = (explode(',',$options));
  if($ww[0] > 0) $pozword = $ww[0]-1;
  if($ww[1] >= 0) $space = $ww[1];
}
$arword = (explode(' ',$input));
reset($arword);
foreach ($arword as $key => $aw){
  if($key == $pozword){
    $output .= '<span>'.$aw.'</span>';
    for($x=0;$x<$space;$x++){
      $output .= ' ';
    }        
  }else{
  $output .= $aw.' ';
  }
}
return $output;
?>