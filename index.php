<?php
error_reporting(0);

$kpc = new Keva();
$rpc = new Raven();
$_REQ = array_merge($_GET, $_POST);



//keva code

$blocknum=$kpc->getblockcount();

$mfile="admin.txt";

$mcheck=file_get_contents($mfile);



//index


if(!$mcheck){


$commx=trim($_REQ["n"]);



$comm=$commx;

if(!$_REQ["n"]) {


$head="<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><title>KPRESS - Decentralized SPACE</title><meta name=\"description\" content=\"Decentralized ID\"><link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"></head><body><div class=\"grid-2\"><div class=\"section-1\" style=\"padding-top: 10vh;\">";

$dida="<h2>META SPACE</h2><p><span><form action=\"\" method=\"post\" ><input type=\"text\" name=\"n\" maxlength=\"50\" placeholder=\" NUMBER or ID\" style=\"width:300px;height:47px;margin-top:10px;padding-top:2px;margin-right:5px;font-size:28px;\"></form></span></p>";

//media


//section b

$didb="</div><div class=\"section-2\"><h2>KPRESS</h2>You can input a kevacoin space number or ID to get contents.";

//media

$didbm= "<h2>SOCIAL MEDIA</h2><a href=https://discord.gg/5zPHhbG>Kevacoin Discord</a>";

//crypto

$didbc="<h2>Github</h2><a href=https://github.com/kevacointoolkit/kpress>github.com/kevacointoolkit/kpress</a>";




$didpage=$head."".$dida."".$didam."".$didac."".$didan."".$didb."".$didbm."".$didbc."".$didbn."".$didbl;

echo $didpage;

 }

}else{

$commx=trim($_REQ["n"]);

$comm=str_replace("d","",$commx);

if(substr($commx,0,1)=="d" & $mcheck==$comm){$commx=trim($_REQ["n"]);}else{

$commx=trim($mcheck);

$comm=$commx;}



}

//content



if(is_numeric($comm) & strlen($comm)>4) 
	
	
	{

	//manage
		


	file_put_contents($mfile,$comm);

	//data
	


	$namedir="updata/";

	$namefile=$namedir."".$comm.".txt";

	$namenscheck=file_get_contents($namefile);

	if(!$namenscheck){

		$blength=substr($comm , 0 , 1);
		$block=substr($comm , 1 , $blength);
		$btxn=$blength+1;
		$btx=substr($comm , $btxn);

		$blockhash= $kpc->getblockhash(intval($block));
		$blockdata= $kpc->getblock($blockhash);
		$txa=$blockdata['tx'][$btx];

			if(!$txa) {$url ="";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}
			
			$transaction= $kpc->getrawtransaction($txa,1);

				foreach($transaction['vout'] as $vout)
	   
						  {

							$op_return = $vout["scriptPubKey"]["asm"]; 

							$arr = explode(' ', $op_return); 

							if($arr[0] == 'OP_KEVA_NAMESPACE') 

								{

								 $cona=$arr[0];
								 $cons=$arr[1];
								 $conk=$arr[2];

								 $freeadd=$vout["scriptPubKey"]["addresses"][0];
								

								}
						  }
				
			$asset=Base58Check::encode($cons, false , 0 , false);

			$kcache=$asset."|".$freeadd."|1";
				
			file_put_contents($namefile,$kcache);
				
						}

					else{
				
							$kcache=explode("|",$namenscheck);

							$asset=$kcache[0];
							$freeadd=$kcache[1];

						}

			  $namespace=$kpc->keva_get($asset,"_KEVA_NS_");

			  $title=bin2hex($namespace['value']);

			  $gname=$title;


if(!$asset) {$url ="/";echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";}


}

//did

if(substr($commx,0,1)=="d") 

	{


$infod="";

$spacedir="cache/";

$spacefile=$spacedir."".$comm.".txt";

$updir="updata/";

$upfile=$updir."".$comm.".txt";

$kfile=file_get_contents($upfile);

		$kdata=explode("|",$kfile);

		$spaceblock=intval($kdata[2]);

		$kcache=$kdata[0]."|".$kdata[1]."|".$blocknum;

		$clen=$blocknum-$spaceblock+5;

		$checkspace=$kpc->keva_filter($asset,"",$clen);
		
		

				if(count($checkspace)>0 or !file_exists($spacefile))
					

					{
					
					$infod=$kpc->keva_filter($asset,"",0);


					}



	foreach ($infod as $k=>$v) 

	{
			
	extract($v);

	$value=$value;

	$key=strip_tags($key,"");

	if($key=="PFP")

		{
			
			//ipfs

		

		

			preg_match('/(?:\{)(.*)(?:\})/i',$value,$match);


			
			if($match[0]<>"")
				
					{

//image

				if(stristr($match[0],"image")==true)

						{
					$ipfsarr=explode("|",$match[0]);

					$filetype=explode("/",$ipfsarr[1]);

					$typ=str_replace("}","",$filetype[1]);

					$ipfsadd=str_replace("{","",$ipfsarr[0]);

					$urla=$ipfsr.trim(substr($ipfsarr[0],2,46));
					$urlb=trim($ipfscon)."".trim(substr($ipfsarr[0],2,46));

				

					$ipfslk="<img src=\"".$urla."\" onerror=\"this.src='/loading.png'\" width=200 class=\"pfp\" style=\"border-radius:10px;background-color: #101214;\">";
					

					$value=str_replace($match[0],$ipfslk,$value);

					

					$mypfp=$value;
					
						}
					}
		}
	if($key=="ABOUT"){$about="<p>".$value."</p>";}

//media

	if($key=="TWITTER"){$twitterp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$twitter="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="REDDIT"){$redditp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$reddit="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="DISCORD"){$discordp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$discord="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="FACEBOOK"){$facebookp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$facebook="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="INSTAGRAM"){$instagramp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$instagram="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="LINKEDIN"){$linkedinp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$linkedin="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="SNAPCHAT"){$snapchatp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$snapchat="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="TELEGRAM"){$telegramp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$telegram="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="TIKTOK"){$tiktokp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$tiktok="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="TUMBLR"){$tumblrp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$tumblr="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="TWITCH"){$twitchp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$twitch="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="YOUTUBE"){$youtubep="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$youtube="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="NINTENDO"){$nintendop="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$nintendo="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="PLAYSTATION"){$playstationp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$playstation="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="STEAM"){$steamp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$steam="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="GITHUB"){$githubp="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$github="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}

	if($key=="WEIBO"){$weibop="<div class=\"nft\"><a href=".$value."><img src=/media/".$key.".png></a></div>";$weibo="<p><a href=".$value.">".$key." <br><font size=1>".$value."</font></a>";}



//crypto

	if($key=="KEVACOIN"){
		
	$mykevap="<div class=\"nft\"><a href=https://explorer.kevacoin.org/address/".$value."><img src=/crypto/".$key.".png></a></div>";
	
	$mykeva="<p><a href=https://explorer.kevacoin.org/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";}

	if($key=="ETHEREUM"){$ethadd=$value;$ethp="<div class=\"nft\"><a href=https://eth.tokenview.com/en/address/".$value."><img src=/crypto/".$key.".png></a></div>";$eth="<p><a href=https://eth.tokenview.com/en/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";}

	if($key=="BITCOIN"){$btcadd=$value;$btcp="<div class=\"nft\"><a href=https://www.blockchain.com/btc/address/".$value."><img src=/crypto/".$key.".png></a></div>";$btc="<p><a href=https://www.blockchain.com/btc/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";}

	
	if($key=="DOGECOIN"){$dogep="<div class=\"nft\"><a href=https://blockchair.com/dogecoin/address/".$value."><img src=/crypto/".$key.".png></a></div>";$doge="<p><a href=https://blockchair.com/dogecoin/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";}

		
	if($key=="MONERO"){$xmrp="<div class=\"nft\"><a href=https://xmrchain.net><img src=/crypto/".$key.".png></a></div>";$xmr="<p><a href=https://xmrchain.net>".$key." <br><font size=1>".$value."</font></a></p>";}

	if($key=="RAVENCOIN"){$rvnadd=substr($value,0,34);
		
		$rvnp="<div class=\"nft\"><a href=https://rvn.cryptoscope.io/address/?address=".$value."><img src=/crypto/".$key.".png></a></div>";
		
		$rvn="<p><a href=https://rvn.cryptoscope.io/address/?address=".$value.">".$key." <br><font size=1>".$value."</font></a></p>";
		
		
		
		}

	if($key=="CHIA"){$xchadd=$value;$chiap="<div class=\"nft\"><a href=https://www.spacescan.io/xch/address/".$value."><img src=/crypto/".$key.".png></a></div>";$chia="<p><a href=https://www.spacescan.io/xch/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";}


	
	if($key=="USDT"){$usdtadd=$value;
		
		$usdtp="<div class=\"nft\"><a href=https://blockchair.com/tether><img src=/crypto/".$key.".png></a></div>";
		
		$usdt="<p><a href=https://blockchair.com/tether>".$key." <br><font size=1>".$value."</font></a></p>";
		
		}

	if($key=="USDC"){$usdcadd=$value;
		
		$usdcp="<div class=\"nft\"><a href=https://blockchair.com/usd-coin><img src=/crypto/".$key.".png></a></div>";
		
		$usdc="<p><a href=https://blockchair.com/usd-coin>".$key." <br><font size=1>".$value."</font></a></p>";
		
		}

	if($key=="BUSD"){$busdadd=$value;
		
		$busdp="<div class=\"nft\"><a href=https://blockchair.com/binance-usd><img src=/crypto/".$key.".png></a></div>";
		
		$busd="<p><a href=https://blockchair.com/binance-usd>".$key." <br><font size=1>".$value."</font></a></p>";
		
		}

	if($key=="BNB"){$bnbadd=$value;
		
		$bnbp="<div class=\"nft\"><a href=https://bscscan.com/address/".$value."><img src=/crypto/".$key.".png></a></div>";
		
		$bnb="<p><a href=href=https://bscscan.com/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";
		
		}

		if($key=="ADA"){$adaadd=$value;
		
		$adap="<div class=\"nft\"><a href=https://explorer.cardano.org/en/no-search-results?query=".$value."><img src=/crypto/".$key.".png></a></div>";
		
		$ada="<p><a href=https://explorer.cardano.org/en/no-search-results?query=".$value.">".$key." <br><font size=1>".$value."</font></a></p>";
		
		}

		if($key=="RIPPLE"){$xrpadd=$value;
		
		$xrpp="<div class=\"nft\"><a href=https://xrpscan.com/account/".$value."><img src=/crypto/".$key.".png></a></div>";
		
		$xrp="<p><a href=https://xrpscan.com/account/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";
		
		}

		if($key=="SOLANA"){$soladd=$value;
		
		$solp="<div class=\"nft\"><a href=https://explorer.solana.com/address/".$value."><img src=/crypto/".$key.".png></a></div>";
		
		$sol="<p><a href=https://explorer.solana.com/address/".$value.">".$key." <br><font size=1>".$value."</font></a></p>";
		
		}



//links

	if($key=="LINKS"){$links="<p>".$value."</p>";}

//chip




//rvnasset

if($key=="RVNASSET"){$assetallow=$value;};

 }


//nft

//eth

	if($ethadd!="")
		
		{
			$openseap="<div class=\"nft\"><a href=https://opensea.io/".$ethadd."><img src=/nft/OPENSEA.png></a></div>";
		
			$opensea="<p><a href=https://opensea.io/".$ethadd.">OPENSEA <br><font size=1>opensea.io</font></a></p>";

	     $dappradarp="<div class=\"nft\"><a href=https://dappradar.com/hub/wallet/eth/".$ethadd."/nfts><img src=/nft/DAPPRADAR.png></a></div>";
		 
		 $dappradar="<p><a href=https://dappradar.com/hub/wallet/eth/".$ethadd."/nfts>DAPPRADAR<br><font size=1>dappradar.com</font></a></p>";

		 $uniswap="<div class=\"nft\"><a href=https://app.uniswap.org/#/swap?chain=mainnet><img src=/nft/uniswap.png></a></div>";

		}

//keva

	if($mykeva!=""){
	
	
	$kevaone="<div class=\"nft\"><a href=https://keva.one><img src=/nft/kevaone.png></a></div>";

	$rpgp="<div class=\"nft\"><a href=https://keva.app?rpg".$comm."><img width=48 height=48 src=\"https://cat.sale/nft/62881502.png\" onerror=\"this.src='/loading.png'\"></a></div>";
	
	}

//chia



	if($xchadd!=""){
	
	
	$dexie="<div class=\"nft\"><a href=https://dexie.space><img src=/nft/dexie.png></a></div>";
	
	}

//rvn

	if($rvnadd!=""){
	
		$rvnasset="<p><a href=https://rvn.cryptoscope.io/address/?address=".$rvnadd.">RVN ASSET<br><font size=1>rvn.cryptoscope.io</font></a></p>";

		$rvnexplorer="<div class=\"nft\"><a href=https://ravencoin.asset-explorer.net><img src=\"/nor.png\"></a></div>";
	

	
				
				$giftassetx=$rpc->listassetbalancesbyaddress($rvnadd);

//rgb

				if($giftassetx["KEVA.APP/CHIP/RGB"]!=""){$rgb="class=\"namergb\"";}

				$giftassety=$rpc->listtagsforaddress($rvnadd);

				//tag

				foreach($giftassety as $gifty=>$giftny)
					{
						
						if(stristr($assetallow,$giftny) == true or strlen($assetallow)==34)
						{
						$listinfo = $rpc->getassetdata($giftny);
			
						$kimg="<div class=\"nft\"><a href=https://www.assetsexplorer.com/assets/?q=".$giftny."><img width=48 height=48 src=https://ravencoin.asset-explorer.net/ipfs/".$listinfo["ipfs_hash"]." onerror=\"this.src='/nor.png'\"></a></div>";
						
					
						$rvnassetp=$rvnassetp."".$kimg;

						}
						
						
						
						}

					

					//asset


				foreach($giftassetx as $giftx=>$giftnx)
					{

					if(stristr($assetallow,$giftx) == true or strlen($assetallow)==34)
						{
						$listinfo = $rpc->getassetdata($giftx);
			

						$kimg="<div class=\"nft\"><a href=https://www.assetsexplorer.com/assets/?q=".$giftx."><img width=48 height=48 src=https://ravencoin.asset-explorer.net/ipfs/".$listinfo["ipfs_hash"]." onerror=\"this.src='/nor.png'\"></a></div>";
						
					
						$rvnassetp=$rvnassetp."".$kimg;


						  }
						 }

		}
					
					   



$namespace=$kpc->keva_get($asset,"_KEVA_NS_");

$head="<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><title>".hex2bin($gname)."</title><meta name=\"description\" content=\"Decentralized ID ".hex2bin($gname)."\"><link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"></head><body><div class=\"grid-2\"><div class=\"section-1\">";

$dida="<h2 ".$rgb.">".hex2bin($gname)."</h2><p><a href=https://dxid.io/p".$comm.">[ ".$comm." ]</a></p>";

//media

$kpage="<div class=\"nft\"><a href=""><img src=/media/keva.png></a></div>";

$didam="<div>".$facebookp."".$twitterp."".$redditp."".$discordp."".$instagramp."".$linkedinp."".$snapchatp."".$telegramp."".$tiktokp."".$tumblrp."".$twitchp."".$youtubep."".$nintendop."".$playstationp."".$steamp."".$githubp."".$weibop."</div>";



//rpg


	$getrpg="NUtVW7Psz2GcjhYCeWTUY6sD1pMyyioHk7,NTtHuPT71qWY8e11hXfzZ7dc35d5Ex2nwm,NLbbLeVppyVEMKd5LocLSXEdjaDReaq87z,NTzbaZNQHo3LrEzayUZQkJa4ssj7qUoYtY,Nbys5xFT5uycHuvrEDQFyZyWwHDcGjQ5QQ";

			  $rpgnp=explode(',', $getrpg);

			  $rpgvalue="";

			  $vcode=$comm;

			  $nftsyle="";

			  	foreach($rpgnp as $np)

				{
				
				

				$getnft=$kpc->keva_get($np,$vcode);

				$nftcheck=$getnft['value'];

				$valuer="";

				if($nftcheck!=""){

					$nftsyle=1;

					preg_match('/(?:\{)(.*)(?:\})/i',$nftcheck,$match);

						if(stristr($match[0],"image") == true)

						{
							
							$ipfsarr=explode("|",$match[0]);

							$filetype=explode("/",$ipfsarr[1]);

							$typ=str_replace("}","",$filetype[1]);

							$ipfsadd=str_replace("{","",$ipfsarr[0]);

							$urla=$ipfsr.trim(substr($ipfsarr[0],2,46));
							$urlb=trim($ipfscon)."".trim(substr($ipfsarr[0],2,46));

							$ipfslk="<div class=\"nft\"><a href=https://keva.app?rpg".$comm."><img width=48 height=48 src=\"".$urla."\" onerror=\"this.src='/loading.png'\"".$nftsyle."></a></div>";
					

							$valuer=str_replace($match[0],$ipfslk,$match[0]);

						 }
					
						}
					 
				
					$rpgvalue=$rpgvalue." ".$valuer;
				}
		


//offer

if($rgb!=""){$offerrgb="<div class=\"nft\"><a href=https://cat.sale/65814761><img width=48 height=48 src=\"/nft/rgb.gif\"></a></div>";
$kcache=$kcache."|RGB";}

$didoffer=$offerrgb;

//crypto

$didbc="<div style=\"clear:both\">".$btcp."".$usdtp."".$usdcp."".$busdp."".$solp."".$xrpp."".$adap."".$bnbp."".$xmrp."".$dogep."</div>";

$didet="<div style=\"clear:both\">".$ethp."".$openseap."".$dappradarp."".$uniswap."</div>";
	
$didkeva="<div style=\"clear:both\">".$mykevap."".$kevaone."".$kpage."".$rpgp."</div>";

$didchia="<div style=\"clear:both\">".$chiap."".$dexie."".$didoffer."</div>";

$didrvn="<div style=\"clear:both\">".$rvnp."".$rvnexplorer."".$rvnassetp."</div>";

$didan=$didbc."".$didet."".$didkeva."".$didchia."".$didrvn."".$rpgvalue."</div>";

//section b

$didb="<div class=\"section-2\"><h2>ABOUT</h2>".$about;

//media

$didbm= "<h2>SOCIAL MEDIA</h2>".$facebook."".$twitter."".$reddit."".$discord."".$instagram."".$linkedin."".$snapchat."".$telegram."".$tiktok."".$tumblr."".$twitch."".$youtube."".$nintendo."".$playstation."".$steam."".$github."".$weibo;

//crypto

$didbc="<h2>CRYPTO</h2>".$btc."".$eth."".$mykeva."".$chia."".$rvn."".$usdt."".$usdc."".$busd."".$sol."".$xrp."".$ada."".$bnb."".$xmr."".$doge;

//nft

$didbn="<h2>NFT</h2>".$opensea."".$dappradar."".$rvnasset;

//links

$didbk="<p><a href=https://dxid.io/".$comm.">Decentralized ID<br><font size=1>dxid.io/".$comm."</font></a></p><p><a href=https://dxid.io/p".$comm.">Page<br><font size=1>dxid.io/p".$comm."</font></a></p><p><a href=https://cat.sale/".$comm.">Shop<br><font size=1>cat.sale/".$comm."</font></a></p><br>";

$didbl="<h2>LINKS</h2>".$didbk."".$links;



$didpage=$head."".$dida."".$didam."".$didac."".$didan."".$didb."".$didbm."".$didbc."".$didbn."".$didbl;



if(!$infod){

$didpage=file_get_contents($spacefile);



	}

	else{

file_put_contents($spacefile,$didpage);


file_put_contents($upfile,$kcache);


		}

echo $didpage;




	

}



//page

if(is_numeric($commx) & strlen($commx)>4)


	
{


$infod="";

$spacedir="pcache/";

$spacefile=$spacedir."".$comm.".txt";



$updir="updata/";

$upfile=$updir."".$comm.".txt";

$kfile=file_get_contents($upfile);

		$kdata=explode("|",$kfile);

		$spaceblock=intval($kdata[2]);

		$kcache=$kdata[0]."|".$kdata[1]."|".$blocknum."|".$kdata[3];

		$clen=$blocknum-$spaceblock+5;

		$checkspace=$kpc->keva_filter($asset,"",$clen);
	

				if(count($checkspace)>0 or !file_exists($spacefile))
					

					{
					
					$infod=$kpc->keva_filter($asset,"",0);


					}

		

		$arr=array();

		$arra=array();
		$totalass=array();

	foreach ($infod as $x_value=>$x) 

	{
			

			extract($x);

			

			If($key=="_KEVA_NS_"){$title=$value;continue;}

			if(substr($value,0,12)=="mimblewimble"){continue;}

			if(substr($key,0,17)=="__WALLET_TRANSFER"){continue;}

			if(stristr($key,"KEVA_NS") == true){continue;}

			//countdown

			If($key=="COUNTDOWN"){$key=" ";$value="<p id=\"demo\" style=\"font-size:60px;text-align:center;\"></p><script>var countDownDate = ".strtotime($value)." * 1000;var now = ".time()." * 1000;var x = setInterval(function() {now = now + 1000;var distance = countDownDate - now; var days = Math.floor(distance / (1000 * 60 * 60 * 24));var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));var seconds = Math.floor((distance % (1000 * 60)) / 1000);document.getElementById(\"demo\").innerHTML = days + \"d \" + hours + \"h \" +minutes + \"m \" + seconds + \"s \";if (distance < 0) {clearInterval(x);document.getElementById(\"demo\").innerHTML = \"EXPIRED\";} }, 1000);</script>";}


			//four digits not support hex2bin

			$arr["heightx"]=$height;
			$arr["key"]=$key;
			$arr["value"]=bin2hex($value);
			$arr["txx"]=$txid;
			$arr["gnamespace"]=$asset;
		
			$gtime= $kpc->getrawtransaction($txid,1);

			$arr["gtime"]=$gtime["time"];
			$arr["adds"]=$addrone;

		
		
			array_push($totalass,$arr);




	}

	arsort($totalass);

	$head="<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"><meta name=\"apple-mobile-web-app-capable\" content=\"yes\"><title>".hex2bin($gname)." SPACE</title><meta name=\"description\" content=\"Decentralized SPACE ".hex2bin($gname)."\"><link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootstrap.min.css?version=3.12.0\"><link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css?version=3.12.0\"></head><body><div class=\"container mt-4\"><div class=\"row\"> <div class=\"col-md-8\">";

	$checkann=$kpc->keva_get($asset,"ABOUT");

	if($kdata[3]=="RGB"){$rgb="class=\"namergb\"";}

	$tit="<div class=\"card mt-2\"><div class=\"card-body\"><div class=\"card-title\"><a href=\"?n=d".$comm."\"><h3 class=\"text-primary\"><span  ".$rgb.">".hex2bin($gname)."<span></h3></a></div><p class=\"text-info card-subtitle mb-3\">".$comm."  - ".$asset."</p><div><div id=\"post-content\"><div class=\"card-text\">".$checkann['value']."</div></div></div></div></div>";





	$page="";


	foreach ($totalass as $k=>$v) 

			{
			
			extract($v);

	$value=hex2bin($value);

	$key=strip_tags($key,"");

	$valuex=str_replace("\n","<br>",$value);

	$pone="<div class=\"card mt-2\"><div class=\"card-body\"><div class=\"card-title\"><h3 class=\"text-primary\">".$key."</h3></div><p class=\"text-info card-subtitle mb-3\"><span ".$rgb.">".hex2bin($gname)."</span> - ".date('Y-m-d H:i',$gtime)."</p><div><div id=\"post-content\"><div class=\"card-text\">".$valuex."</div></div></div></div></div>";

	$page=$page."".$pone;

			}



	$didpage=$head."".$tit."".$page;


	if(!$infod){

	$didpage=file_get_contents($spacefile);

	}

	else{

	file_put_contents($spacefile,$didpage);

	file_put_contents($upfile,$kcache);

	}

	echo $didpage;
	

}


//check58

if(strlen($commx)==34) 
	
{
	$asset=$commx;

	$namespace= $kpc->keva_get($commx,"_KEVA_NS_");

	$title=$namespace['value'];

	$snl=strlen($namespace['height']);
	$snm=$namespace['height'];

	$getblockh=$kpc->getblockheaderbyheight($snm);
			
	$getblockh=$getblockh['block_header']['hash'];
	
	$getblocktx=$kpc->getblock($getblockh);
		
	$sncount=0;
		
	foreach($getblocktx['tx'] as $txa){
	
		$transaction= $kpc->getrawtransaction($txa,1);

		foreach($transaction['vout'] as $vout)
	   
		 {

		$op_return = $vout["scriptPubKey"]["asm"]; 

		$arrb = explode(' ', $op_return); 

		if($arrb[0] == 'OP_KEVA_NAMESPACE') 
			{

			 $cona=$arrb[0];
			 $cons=$arrb[1];
			 $conk=$arrb[2];
			 $cond=$vout["scriptPubKey"]["addresses"][0];

			$assetn=Base58Check::encode($cons, false , 0 , false);

			 if($asset==$assetn){ $sn=$snl."".$snm."".$sncount;}

			}
		 }
				
							

		$sncount=$sncount+1;

		}

		file_put_contents($mfile,$sn);

		$url ="";



echo "<script>window.location.href=decodeURIComponent('".$url."')</script>";

}

class Hash

{
    public static function SHA256(string $data, $raw = true): string
    {
        return hash('sha256', $data, $raw);
    }

    public static function sha256d(string $data): string
    {
        return hash('sha256', hash('sha256', $data, true), true);
    }

    public static function RIPEMD160(string $data, $raw = true): string
    {
        return hash('ripemd160', $data, $raw);
    }
}

class Base58
{
    const AVAILABLE_CHARS = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    public static function encode($num, $length = 58): string
    {
        return Crypto::dec2base($num, $length, self::AVAILABLE_CHARS);
    }

    public static function decode(string $addr, int $length = 58): string
    {
        return Crypto::base2dec($addr, $length, self::AVAILABLE_CHARS);
    }
}

/**
 * @codeCoverageIgnore
 */
class Base58Check
{
    /**
     * Encode Base58Check
     *
     * @param string $string
     * @param int $prefix
     * @param bool $compressed
     * @return string
     */
    public static function encode(string $string, int $prefix = 128, bool $compressed = true)
    {
        $string = hex2bin($string);

        if ($prefix) {
            $string = chr($prefix) . $string;
        }

        if ($compressed) {
            $string .= chr(0x01);
        }

        $string = $string . substr(Hash::SHA256(Hash::SHA256($string)), 0, 4);

        $base58 = Base58::encode(Crypto::bin2bc($string));
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] != "\x00") {
                break;
            }

            $base58 = '1' . $base58;
        }
        return $base58;
    }

    /**
     * Decoding from Base58Check
     *
     * @param string $string
     * @param int $removeLeadingBytes
     * @param int $removeTrailingBytes
     * @param bool $removeCompression
     * @return bool|string
     */
    public static function decode(string $string, int $removeLeadingBytes = 1, int $removeTrailingBytes = 4, bool $removeCompression = true)
    {
        $string = bin2hex(Crypto::bc2bin(Base58::decode($string)));

        //If end bytes: Network type
        if ($removeLeadingBytes) {
            $string = substr($string, $removeLeadingBytes * 2);
        }

        //If the final bytes: Checksum
        if ($removeTrailingBytes) {
            $string = substr($string, 0, -($removeTrailingBytes * 2));
        }

        //If end bytes: compressed byte
        if ($removeCompression) {
            $string = substr($string, 0, -2);
        }

        return $string;
    }
}


/**
 * @codeCoverageIgnore
 */
class Crypto
{
    public static function bc2bin($num)
    {
        return self::dec2base($num, 256);
    }

    public static function dec2base($dec, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);
        $value = "";

        if (!$digits) {
            $digits = self::digits($base);
        }

        while ($dec > $base - 1) {
            $rest = bcmod($dec, $base);
            $dec = bcdiv($dec, $base);
            $value = $digits[$rest] . $value;
        }
        $value = $digits[intval($dec)] . $value;

        return (string)$value;
    }

    public static function base2dec($value, $base, $digits = false)
    {
        if ($base < 2 || $base > 256) {
            die("Invalid Base: " . $base);
        }

        bcscale(0);

        if ($base < 37) {
            $value = strtolower($value);
        }
        if (!$digits) {
            $digits = self::digits($base);
        }

        $size = strlen($value);
        $dec = "0";

        for ($loop = 0; $loop < $size; $loop++) {
            $element = strpos($digits, $value[$loop]);
            $power = bcpow($base, $size - $loop - 1);
            $dec = bcadd($dec, bcmul($element, $power));
        }

        return (string)$dec;
    }

    public static function digits($base)
    {
        if ($base > 64) {
            $digits = "";
            for ($loop = 0; $loop < 256; $loop++) {
                $digits .= chr($loop);
            }
        } else {
            $digits = "0123456789abcdefghijklmnopqrstuvwxyz";
            $digits .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
        }
        $digits = substr($digits, 0, $base);

        return (string)$digits;
    }

    public static function bin2bc($num)
    {
        return self::base2dec($num, 256);
    }
}

 function getBase58CheckAddress($addressBin){
            $hash0 = Hash::SHA256($addressBin);
            $hash1 = Hash::SHA256($hash0);
            $checksum = substr($hash1, 0, 4);
            $checksum = $addressBin . $checksum;
            $result = Base58::encode(Crypto::bin2bc($checksum));

            return $result;
        }



class Keva {

    private $proto;

    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = 'galaxy'; // RPC Username
        $this->password      = 'frontier'; // RPC Password
		$this->host          = '127.0.0.1'; // Localhost
        $this->port          = '9992';
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}


class Raven {

    private $proto;

    private $url;
    private $CACertificate;

    public $status;
    public $error;
    public $raw_response;
    public $response;

    private $id = 0;

    public function __construct($url = null) {
		
        $this->username      = 'galaxy'; // RPC Username
        $this->password      = 'frontier'; // RPC Password
		$this->host          = '127.0.0.1'; // Localhost
        $this->port          = '9991';
        $this->url           = $url;

        $this->proto         = 'http';
        $this->CACertificate = null;
    }

    public function setSSL($certificate = null) {
        $this->proto         = 'https';
        $this->CACertificate = $certificate;
    }

    public function __call($method, $params) {
        $this->status       = null;
        $this->error        = null;
        $this->raw_response = null;
        $this->response     = null;

        $params = array_values($params);

        $this->id++;

        $request = json_encode(array(
            'method' => $method,
            'params' => $params,
            'id'     => $this->id
        ));

        $curl    = curl_init("{$this->proto}://{$this->host}:{$this->port}/{$this->url}");
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->username . ':' . $this->password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: text/plain'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );

        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }

        if ($this->proto == 'https') {
            if (!empty($this->CACertificate)) {
                $options[CURLOPT_CAINFO] = $this->CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME($this->CACertificate);
            } else {
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }

        curl_setopt_array($curl, $options);

        $this->raw_response = curl_exec($curl);
        $this->response     = json_decode($this->raw_response, true);

        $this->status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $curl_error = curl_error($curl);

        curl_close($curl);

        if (!empty($curl_error)) {
            $this->error = $curl_error;
        }

        if ($this->response['error']) {
            $this->error = $this->response['error']['message'];
        } elseif ($this->status != 200) {
            switch ($this->status) {
                case 400:
                    $this->error = 'HTTP_BAD_REQUEST';
                    break;
                case 401:
                    $this->error = 'HTTP_UNAUTHORIZED';
                    break;
                case 403:
                    $this->error = 'HTTP_FORBIDDEN';
                    break;
                case 404:
                    $this->error = 'HTTP_NOT_FOUND';
                    break;
            }
        }

        if ($this->error) {
			return false;
        }

        return $this->response['result'];
    }
}

        
?>

</div>
</div>
</div>


