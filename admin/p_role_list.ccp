<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" defaultDesign="False" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp">
	<Components>
		<Panel id="52" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="53" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Grid id="10" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="3" name="p_role" connection="hrcon" pageSizeLimit="100" wizardCaption="List of P Role " wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" wizardUseSearch="True" childId="2" dataSource="select * from f_list_p_role (null,'{s_keyword}')">
					<Components>
						<Link id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="p_role_Insert" hrefSource="p_role_maint.ccp" removeParameters="p_role_id" wizardThemeItem="NavigatorLink" wizardDefaultValue="Add New" parentName="p_role" PathID="Contentp_rolep_role_Insert">
							<Components/>
							<Events/>
							<LinkParameters/>
							<Attributes/>
							<Features/>
						</Link>
						<Sorter id="18" visible="False" name="Sorter_p_role_id" column="p_role_id" wizardCaption="P Role Id" wizardSortingType="SimpleDir" wizardControl="p_role_id" wizardAddNbsp="False" PathID="Contentp_roleSorter_p_role_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="19" visible="True" name="Sorter_code" column="code" wizardCaption="Code" wizardSortingType="SimpleDir" wizardControl="code" wizardAddNbsp="False" PathID="Contentp_roleSorter_code">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="20" visible="True" name="Sorter_listing_no" column="listing_no" wizardCaption="Listing No" wizardSortingType="SimpleDir" wizardControl="listing_no" wizardAddNbsp="False" PathID="Contentp_roleSorter_listing_no">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="21" visible="True" name="Sorter_valid_from" column="valid_from" wizardCaption="Valid From" wizardSortingType="SimpleDir" wizardControl="valid_from" wizardAddNbsp="False" PathID="Contentp_roleSorter_valid_from">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="22" visible="True" name="Sorter_valid_to" column="valid_to" wizardCaption="Valid To" wizardSortingType="SimpleDir" wizardControl="valid_to" wizardAddNbsp="False" PathID="Contentp_roleSorter_valid_to">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="23" visible="True" name="Sorter_description" column="description" wizardCaption="Description" wizardSortingType="SimpleDir" wizardControl="description" wizardAddNbsp="False" PathID="Contentp_roleSorter_description">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="24" visible="True" name="Sorter_creation_date" column="creation_date" wizardCaption="Creation Date" wizardSortingType="SimpleDir" wizardControl="creation_date" wizardAddNbsp="False" PathID="Contentp_roleSorter_creation_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="25" visible="True" name="Sorter_created_by" column="created_by" wizardCaption="Created By" wizardSortingType="SimpleDir" wizardControl="created_by" wizardAddNbsp="False" PathID="Contentp_roleSorter_created_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="26" visible="True" name="Sorter_updated_date" column="updated_date" wizardCaption="Updated Date" wizardSortingType="SimpleDir" wizardControl="updated_date" wizardAddNbsp="False" PathID="Contentp_roleSorter_updated_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="27" visible="True" name="Sorter_updated_by" column="updated_by" wizardCaption="Updated By" wizardSortingType="SimpleDir" wizardControl="updated_by" wizardAddNbsp="False" PathID="Contentp_roleSorter_updated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Link id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" preserveParameters="GET" name="p_role_id" fieldSource="p_role_id" wizardCaption="P Role Id" wizardIsPassword="False" parentName="p_role" rowNumber="1" hrefSource="p_role_maint.ccp" PathID="Contentp_rolep_role_id" urlType="Relative">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="30" sourceType="DataField" format="yyyy-mm-dd" name="p_role_id" source="p_role_id"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Label id="32" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="code" fieldSource="code" wizardCaption="Code" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_rolecode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="34" fieldSourceType="DBColumn" dataType="Float" html="False" generateSpan="False" name="listing_no" fieldSource="listing_no" wizardCaption="Listing No" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_rolelisting_no">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="36" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="valid_from" fieldSource="valid_from" wizardCaption="Valid From" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_rolevalid_from">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="38" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="valid_to" fieldSource="valid_to" wizardCaption="Valid To" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_rolevalid_to">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="description" fieldSource="description" wizardCaption="Description" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_roledescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="42" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="creation_date" fieldSource="creation_date" wizardCaption="Creation Date" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_rolecreation_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="created_by" fieldSource="created_by" wizardCaption="Created By" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_rolecreated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="46" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="updated_date" fieldSource="updated_date" wizardCaption="Updated Date" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_roleupdated_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="updated_by" fieldSource="updated_by" wizardCaption="Updated By" wizardIsPassword="False" parentName="p_role" rowNumber="1" PathID="Contentp_roleupdated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Label>
						<Navigator id="49" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="TextButtons" wizardFirst="True" wizardFirstText="|&amp;lt;" wizardPrev="True" wizardPrevText="&amp;lt;&amp;lt;" wizardNext="True" wizardNextText="&amp;gt;&amp;gt;" wizardLast="True" wizardLastText="&amp;gt;|" wizardPageNumbers="Simple" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Basic">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="50" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
					</Components>
					<Events/>
					<TableParameters>
					</TableParameters>
					<JoinTables>
					</JoinTables>
					<JoinLinks/>
					<Fields>
					</Fields>
					<PKFields/>
					<SPParameters/>
					<SQLParameters>
						<SQLParameter id="54" dataType="Text" parameterSource="s_keyword" parameterType="Expression" variable="s_keyword"/>
</SQLParameters>
					<SecurityGroups/>
					<Attributes/>
					<Features/>
				</Grid>
				<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="p_roleSearch" returnPage="p_role_list.ccp" wizardCaption="Search  " wizardOrientation="Vertical" wizardFormMethod="post" wizardTypeComponent="Search" PathID="Contentp_roleSearch" parentId="10">
					<Components>
						<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" parentName="p_roleSearch" PathID="Contentp_roleSearchButton_DoSearch">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardCaption="Code" fieldSource="code" wizardIsPassword="False" parentName="p_roleSearch" caption="Code" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_roleSearchs_keyword">
							<Components/>
							<Events/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_role_list_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_list.php" forShow="True" url="p_role_list.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="51" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
