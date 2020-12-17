<?php

class IDocsPlugin extends PluginBase{
	function __construct(){
		parent::__construct();
	}
	public function regist(){
		$this->hookRegist(array(
			'user.commonJs.insert'	=> 'IDocsPlugin.echoJs'
		));
	}
	public function echoJs(){
		$this->echoFile('static/main.js');
	}
	public function index(){
		$fileUrl  = $this->filePathLinkOut($this->in['path']);
		$api = "https://api.idocv.com/view/url?url=";
		header('Location:'.$api.rawurlencode($fileUrl));
	}
}