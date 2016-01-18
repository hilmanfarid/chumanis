<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="lovDynamic" connection="hrcon" dataSource="select {items} from {table_param} {whereClause}" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="lovDynamic">
			<Components>
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
				<ImageLink id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="editlink" PathID="lovDynamiceditlink" hrefSource="role_form.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'role_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'0':{'sourceType':'DataField','parameterSource':'p_role_id','parameterName':'p_role_id'},'length':1,'objectType':'linkParameters'}}"><Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="13" sourceType="DataField" format="yyyy-mm-dd" name="p_role_id" source="p_role_id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</ImageLink>
				<ImageLink id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="addlink" PathID="lovDynamicaddlink" hrefSource="role_form.ccp" linkProperties="{'textSource':'../images/table.gif','textSourceDB':'','hrefSource':'role_form.ccp','hrefSourceDB':'','title':'','target':'','name':'','linkParameters':{'length':0,'objectType':'linkParameters'}}" removeParameters="p_role_id">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</ImageLink>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="items_lov" fieldSource="items_lov" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lovDynamicitems_lov">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="CodeExpression" dataType="Text" html="False" generateSpan="False" name="label_lov" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="lovDynamiclabel_lov">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="30" eventType="Server"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Set Row Style" actionCategory="General" id="16" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
						<Action actionName="Custom Code" actionCategory="General" id="25"/>
					</Actions>
				</Event>
				<Event name="AfterExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="24"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters/>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="26" dataType="Text" parameterSource="implode(&quot;,&quot;, CCGetFromGet('items'))" parameterType="Expression" variable="items"/>
				<SQLParameter id="27" dataType="Text" parameterSource="CCGetFromGet('table')" parameterType="Expression" variable="table_param"/>
				<SQLParameter id="28" dataType="Text" parameterSource="CCGetFromGet('order_param')" parameterType="Expression" variable="order_param"/>
				<SQLParameter id="29" dataType="Text" parameterSource="CCGetFromGet('whereClause')" parameterType="Expression" variable="whereClause"/>
			</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="lov_dynamic_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="lov_dynamic.php" forShow="True" url="lov_dynamic.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
