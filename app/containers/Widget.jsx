import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Rendering from '../components/Rendering'

export default class Widget extends Component {
  render() {
    return (
      <div>
        <section className="widget">
          <h1 className="widget-title">{this.props.wpObject.title}</h1>
          
          <Rendering wpObject={this.props.wpObject} />
        </section>
      </div>
    );
  }
}

Widget.propTypes = {
  wpObject: PropTypes.object
};