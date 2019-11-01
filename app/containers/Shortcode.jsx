import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Rendering from '../components/Rendering';

export default class Shortcode extends Component {
  render() {
    return (
      <div>
        <h1>{this.props.wpObject.title}</h1>
        <Rendering wpObject={this.props.wpObject} />
      </div>
    );
  }
}

Shortcode.propTypes = {
  wpObject: PropTypes.object
};