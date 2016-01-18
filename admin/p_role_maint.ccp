<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Basic" wizardThemeVersion="3.0" defaultDesign="False" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp">
	<Components>
		<Panel id="33" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="34" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Record id="2" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="hrcon" name="p_role" dataSource="p_role" errorSummator="Error" buttonsType="button" wizardRecordKey="p_role_id" wizardCaption="Add/Edit P Role " wizardFormMethod="post" wizardThemeApplyTo="Page" wizardOrientation="Vertical" returnPage="p_role_list.ccp" customUpdate="p_role" customUpdateType="Table" PathID="Contentp_role">
					<Components>
						<Button id="14" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" parentName="p_role" PathID="Contentp_roleButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="15" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" parentName="p_role" PathID="Contentp_roleButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="16" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" parentName="p_role" PathID="Contentp_roleButton_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="p_role_id" fieldSource="p_role_id" required="True" wizardIsPassword="False" parentName="p_role" wizardCaption="P Role Id" caption="P Role Id" unique="False" wizardSize="12" wizardMaxLength="12" PathID="Contentp_rolep_role_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" required="True" wizardIsPassword="False" parentName="p_role" wizardCaption="Code" caption="Code" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_rolecode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="listing_no" fieldSource="listing_no" required="True" wizardIsPassword="False" parentName="p_role" wizardCaption="Listing No" caption="Listing No" unique="False" wizardSize="12" wizardMaxLength="12" PathID="Contentp_rolelisting_no">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_from" fieldSource="valid_from" required="True" wizardIsPassword="False" parentName="p_role" features="(assigned)" wizardCaption="Valid From" caption="Valid From" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_rolevalid_from">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="22" show_weekend="True" name="InlineDatePicker1" category="jQuery" enabled="True">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JDateTimePicker>
							</Features>
						</TextBox>
						<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="valid_to" fieldSource="valid_to" required="False" wizardIsPassword="False" parentName="p_role" features="(assigned)" wizardCaption="Valid To" caption="Valid To" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_rolevalid_to">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="24" show_weekend="True" name="InlineDatePicker2" category="jQuery" enabled="True">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JDateTimePicker>
							</Features>
						</TextBox>
						<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" required="False" wizardIsPassword="False" parentName="p_role" wizardCaption="Description" caption="Description" unique="False" wizardSize="50" wizardMaxLength="250" PathID="Contentp_roledescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" required="True" wizardIsPassword="False" parentName="p_role" features="(assigned)" wizardCaption="Creation Date" caption="Creation Date" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_rolecreation_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="27" show_weekend="True" name="InlineDatePicker3" category="jQuery" enabled="True">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JDateTimePicker>
							</Features>
						</TextBox>
						<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" required="True" wizardIsPassword="False" parentName="p_role" wizardCaption="Created By" caption="Created By" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_rolecreated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" required="True" wizardIsPassword="False" parentName="p_role" features="(assigned)" wizardCaption="Updated Date" caption="Updated Date" format="ShortDate" unique="False" wizardSize="8" wizardMaxLength="100" PathID="Contentp_roleupdated_date">
							<Components/>
							<Events/>
							<Attributes/>
							<Features>
								<JDateTimePicker id="30" show_weekend="True" name="InlineDatePicker4" category="jQuery" enabled="True">
									<Components/>
									<Events/>
									<TableParameters/>
									<SPParameters/>
									<SQLParameters/>
									<JoinTables/>
									<JoinLinks/>
									<Fields/>
									<Features/>
								</JDateTimePicker>
							</Features>
						</TextBox>
						<TextBox id="31" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" required="True" wizardIsPassword="False" parentName="p_role" wizardCaption="Updated By" caption="Updated By" unique="False" wizardSize="50" wizardMaxLength="64" PathID="Contentp_roleupdated_by">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
					</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="p_role_id" parameterSource="p_role_id" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
					</TableParameters>
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
					<UConditions>
						<TableParameter id="3" conditionType="Parameter" useIsNull="False" field="p_role_id" dataType="Float" parameterType="URL" parameterSource="p_role_id" searchConditionType="Equal" logicOperator="And" orderNumber="1"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="4" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id" omitIfEmpty="True"/>
						<CustomParameter id="5" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
						<CustomParameter id="6" field="listing_no" dataType="Float" parameterType="Control" parameterSource="listing_no" omitIfEmpty="True"/>
						<CustomParameter id="7" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" omitIfEmpty="True"/>
						<CustomParameter id="8" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" omitIfEmpty="True"/>
						<CustomParameter id="9" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="10" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" omitIfEmpty="True"/>
						<CustomParameter id="11" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="12" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" omitIfEmpty="True"/>
						<CustomParameter id="13" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
					</UFormElements>
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
		<CodeFile id="Events" language="PHPTemplates" name="p_role_maint_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_maint.php" forShow="True" url="p_role_maint.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="32" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
