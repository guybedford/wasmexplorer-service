<?php

/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */

  $service_version = '2.2';

  $platform = PHP_OS == 'Linux' ? 'linux' :
              (PHP_OS == 'Darwin' ? 'mac' : 'unknown');
  $platform_dir = '../' . $platform . '/';
  $upload_folder_path = '/tmp/wasm-service-uploads/';
  $jsshell_path = $platform_dir . 'jsshell/js';
  $llvm_root = $platform_dir . 'llvm/bin';
  $binaryen_root = $platform_dir . 'binaryen/bin';
  $other_sensitive_paths = array();

  putenv("LLVM_ROOT=$llvm_root");
  putenv("BYNARYEN_ROOT=$binaryen_root");
  putenv("JSSHELL=$jsshell_path");

  if ($platform == 'linux') {
    putenv("LD_LIBRARY_PATH=${llvm_root}/../lib");
  }
  if ($platform == 'mac') {
    putenv("DYLD_LIBRARY_PATH=${llvm_root}/../lib");
  }

  if (!is_dir($upload_folder_path)) {
    mkdir($upload_folder_path);
  }
  
  include 'cors-all.php';
?>
