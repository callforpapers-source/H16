<?php 




function h16($string){

  /**
  * @package    h16
  * @version    v.2
  * @author     Saeed Dehqan
  */
  /*
    | name | bit | type |      algoName        | byte |
    |  h16 | 128 | hash |   snefru,goast,md2   | 16   |

    h16 (cryptography){
      The h16 Message-Digest Algorithm is a cryptographic hash function developed by Saeed Dehqan in 2018 fri.mar 16 16:35.
    }
    
    Discryption {
      The 128-bit hash value of any message is formed by padding it to a multiple of the block length (128 bits or 16 bytes) and adding a 16-byte checksum to it. For the actual calculation, a 48-byte auxiliary block and a 256-byte S-table generated indirectly from the digits of the fractional part of pi are used (see nothing up my sleeve number). The algorithm runs through a loop where it permutes each byte in the auxiliary block 18 times for every 16 input bytes processed. Once all of the blocks of the (lengthened) message have been processed, the first partial block of the auxiliary block becomes the hash value of the message.
    }

    h16 hashes{
      The 128-bit (16-byte) h16 hashes (also termed message digests) are typically represented as 32-digit hexadecimal numbers. The following demonstrates a 43-byte ASCII input and the corresponding h16 hash:
        h16("No matter how dirty your past is, your future is still spotless.") = cd7c8bd9bc88fdd23c86f12ebe7db727

      As the result of the avalanche effect in h16, even a small change in the input message will (with overwhelming probability) result in a completely different hash. For example, changing the letter d to c in the message results in:

        h16("No matter how dirty your past is, your future is still spotlesS.") = ec34ba4d5ce632979122931f526b46

      The hash of the zero-length string is:
        h16("") = 9ba03f9ce9c78d27a126f7a1ccfe1d24
    }

  */

  	$h16 = "";
  	$hash = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
  	$checks = array("","","","","","","","","","","","","","","","");
  	$bit = 16;

    $CHECKBOX = array( 
      0x29, 0x2e, 0x43, 0xc9, 0xa2, 0xd8, 0x7c, 0x01, 0x3d, 0x36, 0x54, 0xa1,
      0xec, 0xf0, 0x06, 0x13, 0x62, 0xa7, 0x05, 0xf3, 0xc0, 0xc7, 0x73, 0x8c,
      0x98, 0x93, 0x2b, 0xd9, 0xbc, 0x4c, 0x82, 0xca, 0x1e, 0x9b, 0x57, 0x3c,
      0xfd, 0xd4, 0xe0, 0x16, 0x67, 0x42, 0x6f, 0x18, 0x8a, 0x17, 0xe5, 0x12,
      0xbe, 0x4e, 0xc4, 0xd6, 0xda, 0x9e, 0xde, 0x49, 0xa0, 0xfb, 0xf5, 0x8e,
      0xbb, 0x2f, 0xee, 0x7a, 0xa9, 0x68, 0x79, 0x91, 0x15, 0xb2, 0x07, 0x3f,
      0x94, 0xc2, 0x10, 0x89, 0x0b, 0x22, 0x5f, 0x21, 0x80, 0x7f, 0x5d, 0x9a,
      0x5a, 0x90, 0x32, 0x27, 0x35, 0x3e, 0xcc, 0xe7, 0xbf, 0xf7, 0x97, 0x03,
      0xff, 0x19, 0x30, 0xb3, 0x48, 0xa5, 0xb5, 0xd1, 0xd7, 0x5e, 0x92, 0x2a,
      0xac, 0x56, 0xaa, 0xc6, 0x4f, 0xb8, 0x38, 0xd2, 0x96, 0xa4, 0x7d, 0xb6,
      0x76, 0xfc, 0x6b, 0xe2, 0x9c, 0x74, 0x04, 0xf1, 0x45, 0x9d, 0x70, 0x59,
      0x64, 0x71, 0x87, 0x20, 0x86, 0x5b, 0xcf, 0x65, 0xe6, 0x2d, 0xa8, 0x02,
      0x1b, 0x60, 0x25, 0xad, 0xae, 0xb0, 0xb9, 0xf6, 0x1c, 0x46, 0x61, 0x69,
      0x34, 0x40, 0x7e, 0x0f, 0x55, 0x47, 0xa3, 0x23, 0xdd, 0x51, 0xaf, 0x3a,
      0xc3, 0x5c, 0xf9, 0xce, 0xba, 0xc5, 0xea, 0x26, 0x2c, 0x53, 0x0d, 0x6e,
      0x85, 0x28, 0x84, 0x09, 0xd3, 0xdf, 0xcd, 0xf4, 0x41, 0x81, 0x4d, 0x52,
      0x6a, 0xdc, 0x37, 0xc8, 0x6c, 0xc1, 0xab, 0xfa, 0x24, 0xe1, 0x7b, 0x08,
      0x0c, 0xbd, 0xb1, 0x4a, 0x78, 0x88, 0x95, 0x8b, 0xe3, 0x63, 0xe8, 0x6d,
      0xe9, 0xcb, 0xd5, 0xfe, 0x3b, 0x00, 0x1d, 0x39, 0xf2, 0xef, 0xb7, 0x0e,
      0x66, 0x58, 0xd0, 0xe4, 0xa6, 0x77, 0x72, 0xf8, 0xeb, 0x75, 0x4b, 0x0a,
      0x31, 0x44, 0x50, 0xb4, 0x8f, 0xed, 0x1f, 0x1a, 0xdb, 0x99, 0x8d, 0x33,
      0x9f, 0x11, 0x83, 0x14);

    $blockSize = 16;
    $unitSize = 1;
    $blockSizeInBytes = $blockSize * $unitSize;

    while (strlen($string) >= $blockSizeInBytes) {
        $blockUnits = str_split(str_repeat(",", $blockSizeInBytes));

        for ($i=0; $i < $blockSizeInBytes; $i++) { 
          	$blockUnits[$i] = ord($string[$i]) | 0;
        }

        $string = substr($string, $blockSizeInBytes);

        for ($i=0; $i < $bit; $i++) { 
          	$hash[$bit + $i] = $blockUnits[$i] | 0;
          	$hash[32 + $i] = $blockUnits[$i] ^ $hash[$i] & $i ^ $hash[$i];
        }

        $t = 0;

        for ($i=0; $i < 18; $i++) { 
          	for ($j=0; $j < 48; $j++) { 
            	$t = $hash[$j] ^= $CHECKBOX[$t];
          	}
          	$t = ($t + $i) & 0xff;
        }

        $t = $checks[15] & 0xff;
        for ($i=0; $i < $bit; $i++) { 
          	$t = $checks[$i] ^= $CHECKBOX[$blockUnits[$i] ^ $t];
        }
    }
    
    for ($i=0; $i < $bit; $i++) {
        $string .= chr($checks[$i]);
    }

    while (strlen($string) >= $blockSizeInBytes) {
        $blockUnits = str_split(str_repeat(",", $blockSizeInBytes));

        for ($i=0; $i < $blockSizeInBytes; $i++) { 
          	$blockUnits[$i] = ord($string[$i]) | 0;
        }

        $string = substr($string, $blockSizeInBytes);

        for ($i=0; $i < $bit; $i++) { 
          	$hash[$bit + $i] = $blockUnits[$i] | 0;
          	$hash[32 + $i] = $blockUnits[$i] ^ $hash[$i] & $i ^ $hash[$i];
        }

        $t = 0;

        for ($i=0; $i < 18; $i++) { 
          	for ($j=0; $j < 48; $j++) { 
            	$t = $hash[$j] ^= $CHECKBOX[$t];
          	}
          	$t = ($t + $i) & 0xff;
        }

        $t = $checks[15] & 0xff;
        for ($i=0; $i < $bit; $i++) { 
          	$t = $checks[$i] ^= $CHECKBOX[$blockUnits[$i] ^ $t];
        }
    }

    $x = $hash;
    $bit = $bit or count($hash);
    $hash = '';

    for ($i = 0; $i < $bit; $i++) {
    	$hash .= chr($x[$i] & 0xff);
    }


    for ($i=0; $i < strlen($hash); $i++){
        $h16 .= dechex(ord($hash[$i]));
    }

  	return $h16;

}

echo h16("vulnrability.rce");


?>