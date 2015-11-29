<?php
require_once 'Scorpion/Utility/NFSession.php';
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'utility/Constants.php';
require_once 'model/service/BaseService.php';

class ProfileService extends BaseService {
    const PROFILE_PATH = '/site-images/profile.conf';
    const SPLITTER = ';;';

    public function getProfile() {
        $profile = array(
            'address' => '北京市朝阳区万红西街2号燕东大厦A座 3017室',
            'cellPhone' => '+86 18611666105',
            'email' => 'info@lianghaodesign.com',
            'fixedPhone' => '010-84505576',
        );

        if (!file_exists(self::PROFILE_PATH)) {
            return $profile;
        }

        $file_content = file_get_contents(self::PROFILE_PATH);
        $contents = explode(self::SPLITTER, $file_content);
        foreach ($contents as $content) {
            $items = explode('=', $content);
            foreach ($profile as $k => $v) {
                if ($k == $items[0]) {
                    $profile[$k] = $items[1];
                }
            }
        }
        return $profile;
    }
    
    public function saveProfile($address, $cellPhone, $email, $fixedPhone) {
        $data = array(
            "address=$address",
            "cellPhone=$cellPhone",
            "email=$email",
            "fixedPhone=$fixedPhone"
        );
        $content = join(self::SPLITTER, $data);
        file_put_contents(self::PROFILE_PATH, $content);

        return array(
            'address' => $address,
            'cellPhone' => $cellPhone,
            'email' => $email,
            'fixedPhone' => $fixedPhone,
        );
    }
}

?>