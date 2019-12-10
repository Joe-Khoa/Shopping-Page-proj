
<?php
class Pager{
	private $_totalItem; // tong so sp
	private $_nItemOnPage; // so sp tren 1 trang
	private $_nPageShow ; // so trang hien thi
	private $_totalPage; // tong so trang
	private $_currentPage; // trang hien tai
	private $_id_type;
	private $_OriginURL;
	
	/**
	 * gan gia tri cho cac thuoc tinh
	 */
	public function __construct(int $totalItem, int $currentPage = 1,$nItemOnPage = 5,$nPageShow = 5,$OriginURL){
		// echo 'paging-extension'; die;
		$this->_OriginURL =$OriginURL;
		// $this->_id_type = $id_type;
		$this->_totalItem 	= $totalItem;
		$this->_nItemOnPage	= $nItemOnPage;
		if ($nPageShow%2==0) {
			$nPageShow 		= $nPageShow + 1;
		}
		$this->_nPageShow 	= $nPageShow;
		$this->_currentPage = abs($currentPage);
		$this->_totalPage  	= ceil($totalItem/$nItemOnPage);  
	}
	public function showPagination(){
        $paginationHTML 	= '';
		if($this->_totalPage > 1){
			$actual_link = ($_SERVER['REQUEST_SCHEME']=='http' ? "http" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			// echo $actual_link; die;
			// echo $_SERVER[HTTP_HOST].'<br>';die;

			// echo $actual_link.'<br>';
			// echo $this->_OriginURL;

			if($actual_link != $this->_OriginURL){
				$arr = explode('/', $actual_link); // string to array ??
				// echo '<pre>';print_r($arr); die;
				if( is_numeric($arr[count($arr)-1]) ){
					unset($arr[count($arr)-1]); // remove last item of array -> to get PURE-LINK
				}
				$actual_link  = implode('/',$arr); // array to string ??
				// echo $actual_link;die;
			}						
			$start 	= ''; 
			$prev 	= ''; 
			if($this->_currentPage > 1){
                $start 	= "<li><a href='$actual_link/1'>Start</a></li>";
				$prev 	= "<li><a href='$actual_link/".($this->_currentPage-1)."'>«</a></li>";
            }
            
			$next 	= ''; 
			$end 	= ''; 
			if($this->_currentPage < $this->_totalPage){
				$next 	= "<li><a href='$actual_link/".($this->_currentPage+1)."'>»</a></li>";
				$end 	= "<li><a href='$actual_link/".$this->_totalPage."'>End</a></li>";
			}
		
			$startPage		= 1;
			$endPage		= $this->_totalPage;
			// 10 
			// 5
			if($this->_nPageShow < $this->_totalPage){
				if($this->_currentPage == 1 ){
					$startPage 	= 1;
					$endPage 	= $this->_nPageShow;
                }
                else if($this->_currentPage == $this->_totalPage){
                    $startPage 	= $this->_totalPage - $this->_nPageShow + 1;
					$endPage 	= $this->_totalPage;
                }
				else{
					$startPage		= $this->_currentPage - ($this->_nPageShow-1)/2;
					$endPage		= $this->_currentPage + ($this->_nPageShow-1)/2;

					if($startPage < 1){
						$endPage	= $endPage + 1; 
						$startPage 	= 1; 
					}
					if($endPage > $this->_totalPage){
						$endPage	= $this->_totalPage;
						$startPage 	= $endPage - $this->_nPageShow + 1;
						// $startPage 	= $startPage - 1;

					}
				}
			}
			$listPages = '';
			for($i = $startPage; $i <= $endPage; $i++){
				if($i == $this->_currentPage) {
					$listPages .= "<li><a class='active'>".$i.'</a>';
				}
				else{
					$listPages .= "<li><a href='$actual_link/".$i."'>".$i.'</a>';
				}
			}
			$paginationHTML = '<ul>'.$start.$prev.$listPages.$next.$end.'</ul>';
		}
		return $paginationHTML;
	}
}
