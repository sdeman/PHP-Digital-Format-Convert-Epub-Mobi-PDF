<?php
/**
 * @defgroup Mobi
 */
/**
 * @file application/models/MobiModel.php
 * Distributed under the GNU GPL v2. For
 * @class MobiModel
 * @ingroup Mobi
 * @brief Class defining low-level operations for Mobi conversion from Microsoft Word Files
 */

	class MobiModel 
	{
		
		/**
		 * Constructor
		 * Instantiate bootstrap, get instance of conversion tools
		 */
		public function __construct(array $tools) 
		{
			$this->dfcTools = $tools;
		}
		
		/**
		 * createMobi
		 * Get instance of TransformModel, get HTML from manuscript, pass to conversion tools and send Mobi to browser
		 * @param $options array output options and manuscript src
		 */	
		public function createMobi(TransformModel $transform, array $options) 
		{
			$html = $transform->getDocumentHTML($options['src']);
			$mobi = $this->dfcTools['mobiConverter'];
			$mobi->setData($html);
			$zipData = $mobi->download("Example.mobi");
		} 
		
	}