<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" useDesign="False" needGeneration="0" masterPage="../Designs/d01/MasterBlank.ccp">
	<Components>
		<Panel id="31" visible="True" generateDiv="False" name="content_blank" contentPlaceholder="content_blank">
			<Components>
				<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" name="lovDynamic" connection="hrcon" dataSource="select {items} from {table_param}" pageSizeLimit="100" pageSize="False" wizardCaption="Daftar Role" wizardThemeApplyTo="Page" wizardGridType="Tabular" wizardAllowInsert="False" wizardAltRecord="True" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardGridPagingType="Custom" wizardUseSearch="False" wizardAddNbsp="False" gridTotalRecords="False" wizardAddPanels="False" wizardType="Grid" wizardUseInterVariables="False" addTemplatePanel="False" changedCaptionGrid="True" gridExtendedHTML="False" PathID="content_blanklovDynamic">
					<Components>
						<Navigator id="10" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardImages="Images" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="False" wizardImagesScheme="None">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="11" eventType="Server"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
						<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="items_lov" fieldSource="items_lov" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="content_blanklovDynamicitems_lov">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="19" fieldSourceType="CodeExpression" dataType="Text" html="True" generateSpan="False" name="label_lov" wizardCaption="Code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="content_blanklovDynamiclabel_lov">
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
						<Label id="34" fieldSourceType="CodeExpression" dataType="Text" html="False" generateSpan="False" name="items_return" PathID="content_blanklovDynamicitems_return" fieldSource="&quot;&quot;">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Hidden id="49" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="items_null" PathID="content_blanklovDynamicitems_null">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
</Components>
					<Events>
						<Event name="BeforeShowRow" type="Server">
							<Actions>
								<Action actionName="Set Row Style" actionCategory="General" id="16" styles="Row;AltRow" name="rowStyle" eventType="Server"/>
								<Action actionName="Custom Code" actionCategory="General" id="25" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="AfterExecuteSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="24" eventType="Server"/>
							</Actions>
						</Event>
						<Event name="BeforeExecuteSelect" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="44"/>
							</Actions>
						</Event>
						<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="50"/>
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
						<SQLParameter id="45" dataType="Text" parameterSource="implode(&quot;,&quot;, CCGetFromGet('items'))" parameterType="Expression" variable="items"/>
						<SQLParameter id="46" dataType="Text" parameterSource="CCGetFromGet('table')" parameterType="Expression" variable="table_param"/>
						<SQLParameter id="47" dataType="Text" parameterSource="CCGetFromGet('order_param')" parameterType="Expression" variable="order_param"/>
					</SQLParameters>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Grid>
				<Record id="35" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_menu" searchIds="35" fictitiousConnection="hrcon" fictitiousDataSource="p_menu" wizardCaption="Search  " changedCaptionSearch="False" wizardOrientation="Vertical" wizardFormMethod="post" gridSearchClearLink="False" wizardTypeComponent="Search" gridSearchType="And" wizardInteractiveSearch="False" gridSearchRecPerPage="False" wizardTypeButtons="button" wizardDefaultButton="False" gridSearchSortField="False" wizardUseInterVariables="False" wizardThemeApplyTo="Page" addTemplatePanel="False" wizardSpecifyResultsForm="False" PathID="content_blankp_menu" connection="hrcon" dataSource="select 1">
					<Components>
						<Button id="36" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="content_blankp_menuButton_DoSearch">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="37" visible="Yes" fieldSourceType="CodeExpression" dataType="Text" name="searchKey" fieldSource="CCGetFromPost('searchKey')" wizardIsPassword="False" wizardCaption="File Name" caption="searchKey" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="content_blankp_menusearchKey" defaultValue="&quot;&quot;">
							<Components/>
							<Events>
								<Event name="OnValidate" type="Server">
									<Actions>
										<Action actionName="Custom Code" actionCategory="General" id="38"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</TextBox>
					</Components>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters/>
					<IFormElements/>
					<USPParameters/>
					<USQLParameters/>
					<UConditions/>
					<UFormElements/>
					<DSPParameters/>
					<DSQLParameters/>
					<DConditions/>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Record>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="33" visible="True" generateDiv="False" name="Content">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="32" visible="True" generateDiv="False" name="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="lov_dynamic2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="lov_dynamic2.php" forShow="True" url="lov_dynamic2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
