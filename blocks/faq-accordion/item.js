import { registerBlockType } from '@wordpress/blocks';
import { RichText, BlockControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton } from '@wordpress/components';
import './editor.scss';

registerBlockType('mytheme/faq-accordion-item', {
	title: 'FAQ Item',
	category: 'widgets',
	parent: ['mytheme/faq-accordion'],
	attributes: {
		question: { type: 'string', default: 'Example question?' },
		answer: { type: 'string', default: 'Example answer.' }
	},
	edit: ({ attributes, setAttributes, clientId }) => {
		const { question, answer } = attributes;

		const removeBlock = () => {
			wp.data.dispatch('core/block-editor').removeBlock(clientId);
		};

		return (
			<div className="faq-item-editor">
				<BlockControls>
					<ToolbarGroup>
						<ToolbarButton
							icon="trash"
							label="Remove FAQ Item"
							onClick={removeBlock}
						/>
					</ToolbarGroup>
				</BlockControls>

				<RichText
					tagName="div"
					className="faq-question"
					value={question}
					onChange={(value) => setAttributes({ question: value })}
					placeholder="Enter question"
				/>
				<RichText
					tagName="div"
					className="faq-answer"
					value={answer}
					onChange={(value) => setAttributes({ answer: value })}
					placeholder="Enter answer"
				/>
			</div>
		);
	},
	save: ({ attributes, context }) => {
		const { question, answer } = attributes;
		return (
			<div className="faq-item">
				<div className="faq-question">
					<span className="faq-number"></span>
					{question}
					<span className="faq-icon"></span>
				</div>
				<div className="faq-answer" dangerouslySetInnerHTML={{ __html: answer }}></div>
			</div>
		);
	}
});
