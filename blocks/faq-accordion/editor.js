import { registerBlockType } from '@wordpress/blocks';
import { RichText, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import './editor.scss';

registerBlockType('mytheme/faq-accordion', {
	edit: ({ attributes, setAttributes }) => {
		const { heading } = attributes;

		return (
			<div className="faq-accordion-editor">
				<InspectorControls>
					<PanelBody title="FAQ Settings">
						<TextControl
							label="Heading"
							value={heading}
							onChange={(value) => setAttributes({ heading: value })}
						/>
					</PanelBody>
				</InspectorControls>

				<RichText
					tagName="h2"
					value={heading}
					onChange={(value) => setAttributes({ heading: value })}
					placeholder="Enter FAQ Heading"
					className="faq-heading"
				/>

				<div className="faq-accordion">
					<InnerBlocks
						allowedBlocks={['mytheme/faq-accordion-item']}
						template={[['mytheme/faq-accordion-item']]}
						templateLock={false}
					/>
				</div>
			</div>
		);
	},
	save: ({ attributes }) => {
		const { heading } = attributes;

		return (
			<div className="faq-accordion-wrapper">
				{heading && <h2 className="faq-heading">{heading}</h2>}
				<div className="faq-accordion">
					<InnerBlocks.Content />
				</div>
			</div>
		);
	}
});
