<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\lov" secured="False" urlType="Relative" isIncluded="True" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" name="roleGrid" connection="hrcon" dataSource="p_role" orderBy="p_role_id" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="lov_p_roleroleGrid">
			<Components>
				<Label id="3" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="code" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridcode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="4" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="is_active" fieldSource="is_active" wizardCaption="Is Active" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridis_active">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="description" fieldSource="description" wizardCaption="Description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGriddescription">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="6" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="creation_date" fieldSource="creation_date" wizardCaption="Creation Date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridcreation_date" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="7" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="created_by" fieldSource="created_by" wizardCaption="Created By" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridcreated_by">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="8" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="updated_date" fieldSource="updated_date" wizardCaption="Updated Date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridupdated_date" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="9" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="updated_by" fieldSource="updated_by" wizardCaption="Updated By" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridupdated_by">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="10" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardImagesScheme="None">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="11"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<ImageLink id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="lov_p_roleroleGrideditlink" hrefSource="role_form.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'role_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="13" sourceType="DataField" format="yyyy-mm-dd" name="p_role_id" source="p_role_id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<ImageLink id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="lov_p_roleroleGridaddlink" hrefSource="role_form.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'role_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_role_id">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="p_role_id" fieldSource="p_role_id" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lov_p_roleroleGridp_role_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="16" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
				<JoinTable id="17" tableName="p_role"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="lov_p_role_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="lov_p_role.php" forShow="True" url="lov_p_role.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
