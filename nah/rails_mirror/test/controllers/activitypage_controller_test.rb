require 'test_helper'

class ActivitypageControllerTest < ActionDispatch::IntegrationTest
  test "should get activity" do
    get activitypage_activity_url
    assert_response :success
  end

end
