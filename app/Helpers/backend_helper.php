<?php




if (!function_exists('af_setting')) {
  function af_setting($name)
  {
    if (\Schema::hasTable('settings')) {
      if (count(App\Models\Setting::all()) > 0) {
        $setting = App\Models\Setting::find(1);
        if ($setting->$name) {
          return $setting->$name;
        }
      }
    }

    return 'admin';
  }
}
