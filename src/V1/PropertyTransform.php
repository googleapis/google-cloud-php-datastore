<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/datastore/v1/datastore.proto

namespace Google\Cloud\Datastore\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A transformation of an entity property.
 *
 * Generated from protobuf message <code>google.datastore.v1.PropertyTransform</code>
 */
class PropertyTransform extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The name of the property.
     * Property paths (a list of property names separated by dots (`.`)) may be
     * used to refer to properties inside entity values. For example `foo.bar`
     * means the property `bar` inside the entity property `foo`.
     * If a property name contains a dot `.` or a backlslash `\`, then that name
     * must be escaped.
     *
     * Generated from protobuf field <code>string property = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $property = '';
    protected $transform_type;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $property
     *           Optional. The name of the property.
     *           Property paths (a list of property names separated by dots (`.`)) may be
     *           used to refer to properties inside entity values. For example `foo.bar`
     *           means the property `bar` inside the entity property `foo`.
     *           If a property name contains a dot `.` or a backlslash `\`, then that name
     *           must be escaped.
     *     @type int $set_to_server_value
     *           Sets the property to the given server value.
     *     @type \Google\Cloud\Datastore\V1\Value $increment
     *           Adds the given value to the property's current value.
     *           This must be an integer or a double value.
     *           If the property is not an integer or double, or if the property does not
     *           yet exist, the transformation will set the property to the given value.
     *           If either of the given value or the current property value are doubles,
     *           both values will be interpreted as doubles. Double arithmetic and
     *           representation of double values follows IEEE 754 semantics.
     *           If there is positive/negative integer overflow, the property is resolved
     *           to the largest magnitude positive/negative integer.
     *     @type \Google\Cloud\Datastore\V1\Value $maximum
     *           Sets the property to the maximum of its current value and the given
     *           value.
     *           This must be an integer or a double value.
     *           If the property is not an integer or double, or if the property does not
     *           yet exist, the transformation will set the property to the given value.
     *           If a maximum operation is applied where the property and the input value
     *           are of mixed types (that is - one is an integer and one is a double)
     *           the property takes on the type of the larger operand. If the operands are
     *           equivalent (e.g. 3 and 3.0), the property does not change.
     *           0, 0.0, and -0.0 are all zero. The maximum of a zero stored value and
     *           zero input value is always the stored value.
     *           The maximum of any numeric value x and NaN is NaN.
     *     @type \Google\Cloud\Datastore\V1\Value $minimum
     *           Sets the property to the minimum of its current value and the given
     *           value.
     *           This must be an integer or a double value.
     *           If the property is not an integer or double, or if the property does not
     *           yet exist, the transformation will set the property to the input value.
     *           If a minimum operation is applied where the property and the input value
     *           are of mixed types (that is - one is an integer and one is a double)
     *           the property takes on the type of the smaller operand. If the operands
     *           are equivalent (e.g. 3 and 3.0), the property does not change. 0, 0.0,
     *           and -0.0 are all zero. The minimum of a zero stored value and zero input
     *           value is always the stored value. The minimum of any numeric value x and
     *           NaN is NaN.
     *     @type \Google\Cloud\Datastore\V1\ArrayValue $append_missing_elements
     *           Appends the given elements in order if they are not already present in
     *           the current property value.
     *           If the property is not an array, or if the property does not yet exist,
     *           it is first set to the empty array.
     *           Equivalent numbers of different types (e.g. 3L and 3.0) are
     *           considered equal when checking if a value is missing.
     *           NaN is equal to NaN, and the null value is equal to the null value.
     *           If the input contains multiple equivalent values, only the first will
     *           be considered.
     *           The corresponding transform result will be the null value.
     *     @type \Google\Cloud\Datastore\V1\ArrayValue $remove_all_from_array
     *           Removes all of the given elements from the array in the property.
     *           If the property is not an array, or if the property does not yet exist,
     *           it is set to the empty array.
     *           Equivalent numbers of different types (e.g. 3L and 3.0) are
     *           considered equal when deciding whether an element should be removed.
     *           NaN is equal to NaN, and the null value is equal to the null value.
     *           This will remove all equivalent values if there are duplicates.
     *           The corresponding transform result will be the null value.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Datastore\V1\Datastore::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The name of the property.
     * Property paths (a list of property names separated by dots (`.`)) may be
     * used to refer to properties inside entity values. For example `foo.bar`
     * means the property `bar` inside the entity property `foo`.
     * If a property name contains a dot `.` or a backlslash `\`, then that name
     * must be escaped.
     *
     * Generated from protobuf field <code>string property = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Optional. The name of the property.
     * Property paths (a list of property names separated by dots (`.`)) may be
     * used to refer to properties inside entity values. For example `foo.bar`
     * means the property `bar` inside the entity property `foo`.
     * If a property name contains a dot `.` or a backlslash `\`, then that name
     * must be escaped.
     *
     * Generated from protobuf field <code>string property = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setProperty($var)
    {
        GPBUtil::checkString($var, True);
        $this->property = $var;

        return $this;
    }

    /**
     * Sets the property to the given server value.
     *
     * Generated from protobuf field <code>.google.datastore.v1.PropertyTransform.ServerValue set_to_server_value = 2;</code>
     * @return int
     */
    public function getSetToServerValue()
    {
        return $this->readOneof(2);
    }

    public function hasSetToServerValue()
    {
        return $this->hasOneof(2);
    }

    /**
     * Sets the property to the given server value.
     *
     * Generated from protobuf field <code>.google.datastore.v1.PropertyTransform.ServerValue set_to_server_value = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setSetToServerValue($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Datastore\V1\PropertyTransform\ServerValue::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Adds the given value to the property's current value.
     * This must be an integer or a double value.
     * If the property is not an integer or double, or if the property does not
     * yet exist, the transformation will set the property to the given value.
     * If either of the given value or the current property value are doubles,
     * both values will be interpreted as doubles. Double arithmetic and
     * representation of double values follows IEEE 754 semantics.
     * If there is positive/negative integer overflow, the property is resolved
     * to the largest magnitude positive/negative integer.
     *
     * Generated from protobuf field <code>.google.datastore.v1.Value increment = 3;</code>
     * @return \Google\Cloud\Datastore\V1\Value|null
     */
    public function getIncrement()
    {
        return $this->readOneof(3);
    }

    public function hasIncrement()
    {
        return $this->hasOneof(3);
    }

    /**
     * Adds the given value to the property's current value.
     * This must be an integer or a double value.
     * If the property is not an integer or double, or if the property does not
     * yet exist, the transformation will set the property to the given value.
     * If either of the given value or the current property value are doubles,
     * both values will be interpreted as doubles. Double arithmetic and
     * representation of double values follows IEEE 754 semantics.
     * If there is positive/negative integer overflow, the property is resolved
     * to the largest magnitude positive/negative integer.
     *
     * Generated from protobuf field <code>.google.datastore.v1.Value increment = 3;</code>
     * @param \Google\Cloud\Datastore\V1\Value $var
     * @return $this
     */
    public function setIncrement($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\V1\Value::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Sets the property to the maximum of its current value and the given
     * value.
     * This must be an integer or a double value.
     * If the property is not an integer or double, or if the property does not
     * yet exist, the transformation will set the property to the given value.
     * If a maximum operation is applied where the property and the input value
     * are of mixed types (that is - one is an integer and one is a double)
     * the property takes on the type of the larger operand. If the operands are
     * equivalent (e.g. 3 and 3.0), the property does not change.
     * 0, 0.0, and -0.0 are all zero. The maximum of a zero stored value and
     * zero input value is always the stored value.
     * The maximum of any numeric value x and NaN is NaN.
     *
     * Generated from protobuf field <code>.google.datastore.v1.Value maximum = 4;</code>
     * @return \Google\Cloud\Datastore\V1\Value|null
     */
    public function getMaximum()
    {
        return $this->readOneof(4);
    }

    public function hasMaximum()
    {
        return $this->hasOneof(4);
    }

    /**
     * Sets the property to the maximum of its current value and the given
     * value.
     * This must be an integer or a double value.
     * If the property is not an integer or double, or if the property does not
     * yet exist, the transformation will set the property to the given value.
     * If a maximum operation is applied where the property and the input value
     * are of mixed types (that is - one is an integer and one is a double)
     * the property takes on the type of the larger operand. If the operands are
     * equivalent (e.g. 3 and 3.0), the property does not change.
     * 0, 0.0, and -0.0 are all zero. The maximum of a zero stored value and
     * zero input value is always the stored value.
     * The maximum of any numeric value x and NaN is NaN.
     *
     * Generated from protobuf field <code>.google.datastore.v1.Value maximum = 4;</code>
     * @param \Google\Cloud\Datastore\V1\Value $var
     * @return $this
     */
    public function setMaximum($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\V1\Value::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Sets the property to the minimum of its current value and the given
     * value.
     * This must be an integer or a double value.
     * If the property is not an integer or double, or if the property does not
     * yet exist, the transformation will set the property to the input value.
     * If a minimum operation is applied where the property and the input value
     * are of mixed types (that is - one is an integer and one is a double)
     * the property takes on the type of the smaller operand. If the operands
     * are equivalent (e.g. 3 and 3.0), the property does not change. 0, 0.0,
     * and -0.0 are all zero. The minimum of a zero stored value and zero input
     * value is always the stored value. The minimum of any numeric value x and
     * NaN is NaN.
     *
     * Generated from protobuf field <code>.google.datastore.v1.Value minimum = 5;</code>
     * @return \Google\Cloud\Datastore\V1\Value|null
     */
    public function getMinimum()
    {
        return $this->readOneof(5);
    }

    public function hasMinimum()
    {
        return $this->hasOneof(5);
    }

    /**
     * Sets the property to the minimum of its current value and the given
     * value.
     * This must be an integer or a double value.
     * If the property is not an integer or double, or if the property does not
     * yet exist, the transformation will set the property to the input value.
     * If a minimum operation is applied where the property and the input value
     * are of mixed types (that is - one is an integer and one is a double)
     * the property takes on the type of the smaller operand. If the operands
     * are equivalent (e.g. 3 and 3.0), the property does not change. 0, 0.0,
     * and -0.0 are all zero. The minimum of a zero stored value and zero input
     * value is always the stored value. The minimum of any numeric value x and
     * NaN is NaN.
     *
     * Generated from protobuf field <code>.google.datastore.v1.Value minimum = 5;</code>
     * @param \Google\Cloud\Datastore\V1\Value $var
     * @return $this
     */
    public function setMinimum($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\V1\Value::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Appends the given elements in order if they are not already present in
     * the current property value.
     * If the property is not an array, or if the property does not yet exist,
     * it is first set to the empty array.
     * Equivalent numbers of different types (e.g. 3L and 3.0) are
     * considered equal when checking if a value is missing.
     * NaN is equal to NaN, and the null value is equal to the null value.
     * If the input contains multiple equivalent values, only the first will
     * be considered.
     * The corresponding transform result will be the null value.
     *
     * Generated from protobuf field <code>.google.datastore.v1.ArrayValue append_missing_elements = 6;</code>
     * @return \Google\Cloud\Datastore\V1\ArrayValue|null
     */
    public function getAppendMissingElements()
    {
        return $this->readOneof(6);
    }

    public function hasAppendMissingElements()
    {
        return $this->hasOneof(6);
    }

    /**
     * Appends the given elements in order if they are not already present in
     * the current property value.
     * If the property is not an array, or if the property does not yet exist,
     * it is first set to the empty array.
     * Equivalent numbers of different types (e.g. 3L and 3.0) are
     * considered equal when checking if a value is missing.
     * NaN is equal to NaN, and the null value is equal to the null value.
     * If the input contains multiple equivalent values, only the first will
     * be considered.
     * The corresponding transform result will be the null value.
     *
     * Generated from protobuf field <code>.google.datastore.v1.ArrayValue append_missing_elements = 6;</code>
     * @param \Google\Cloud\Datastore\V1\ArrayValue $var
     * @return $this
     */
    public function setAppendMissingElements($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\V1\ArrayValue::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Removes all of the given elements from the array in the property.
     * If the property is not an array, or if the property does not yet exist,
     * it is set to the empty array.
     * Equivalent numbers of different types (e.g. 3L and 3.0) are
     * considered equal when deciding whether an element should be removed.
     * NaN is equal to NaN, and the null value is equal to the null value.
     * This will remove all equivalent values if there are duplicates.
     * The corresponding transform result will be the null value.
     *
     * Generated from protobuf field <code>.google.datastore.v1.ArrayValue remove_all_from_array = 7;</code>
     * @return \Google\Cloud\Datastore\V1\ArrayValue|null
     */
    public function getRemoveAllFromArray()
    {
        return $this->readOneof(7);
    }

    public function hasRemoveAllFromArray()
    {
        return $this->hasOneof(7);
    }

    /**
     * Removes all of the given elements from the array in the property.
     * If the property is not an array, or if the property does not yet exist,
     * it is set to the empty array.
     * Equivalent numbers of different types (e.g. 3L and 3.0) are
     * considered equal when deciding whether an element should be removed.
     * NaN is equal to NaN, and the null value is equal to the null value.
     * This will remove all equivalent values if there are duplicates.
     * The corresponding transform result will be the null value.
     *
     * Generated from protobuf field <code>.google.datastore.v1.ArrayValue remove_all_from_array = 7;</code>
     * @param \Google\Cloud\Datastore\V1\ArrayValue $var
     * @return $this
     */
    public function setRemoveAllFromArray($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\V1\ArrayValue::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getTransformType()
    {
        return $this->whichOneof("transform_type");
    }

}

