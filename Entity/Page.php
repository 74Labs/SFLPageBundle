<?php

namespace SFL\PageBundle\Entity;

class Page {

	protected $id;
  
	protected $url;
	
	protected $title;	
  
	protected $content;
	
	protected $level;
	
	protected $layout;
/*	
	protected $createDate;
	
	protected $updateDate;
*/
	protected $published;
	
	public function onPrePersist()
	{
		//$this->createDate = new \DateTime('now');
		$this->level = $this->calculateLevel($this->url);
	}
	
	public function onPreUpdate() {
		//$this->updateDate = new \DateTime('now');
		$this->level = $this->calculateLevel($this->url);
	}
	
	private function calculateLevel($url) {
	    return substr_count($url, '/');
	}
/*	
	public function getCreateDate() {
		return $this->createDate;
	}
	
	public function getUpdateDate() {
		return $this->updateDate;
	}
*/	
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	public function getId() {
		return $this->id;
	}	
	
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	
	public function getUrl() {
		return $this->url;
	}	
	
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	
	public function getTitle() {
		return $this->title;
	}	
	
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function setLayout($layout) {
		$this->layout = $layout;
		return $this;
	}
	
	public function getLayout() {
		return $this->layout;
	}
	
	public function setPublished($published) {
		$this->published = $published;
		return $this;
	}
	
	public function isPublished() {
		return $this->published;
	}

}