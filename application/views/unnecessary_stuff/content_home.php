<div id="content">
		<?php 
		$title = "My Home Page";
		echo heading($title, 1); 
		?>
		<p> Welcome to my awesome homepage, this is Oliver </p>
		<p> Data Container Arrays (DCAs) are used to store table meta data. Each DCA describes a particular table in terms of its configuration, its relations to other tables and its fields. The Contao core engine determines by this meta data how to list records, how to render back end forms and how to save data. The DCA files of all active module are loaded one after the other (starting with "backend" and "frontend" and then in alphabetical order), so that every module can override the existing configuration. 
		A Data Container Array is devided into six sections. The first section stores the general table configuration like relations to other tables. The second and third section determine how records are listed and which operations a user is allowed to execute. The fourth section defines different groups of form fields which are called "palettes" and the last two sections describe the input fields in detail.</p>
	</div>