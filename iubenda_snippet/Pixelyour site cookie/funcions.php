<? }


/* Pixel yoursite blocco preventivo da IUBENDA */

function maybe_consent_fb() {

        $data = stripslashes($_COOKIE['_iub_cs-58918011'] ); // ATTENZIONE inserire codice cookie iubenda
        $jsondata =json_decode($data,true);

        // Only display the tracking code if the user has accepted the GDPR Cookie Consent policy
        if ( $jsondata &&  $jsondata['purposes'][5]) {
           return FALSE;

        }else{
            return TRUE;        
       }  
}
//Disable facebook
add_filter('pys_disable_facebook_by_gdpr','maybe_consent_fb');