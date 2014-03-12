
describe("Make sure counter > 0", function() {
    it("Must be zero or greater amount of classes", function() {
        expect(counter).toBeGreaterThan(-1);
	});
});


describe("name div", function() {
    it("check if div for name is being created", function() {
		var parentDiv = document.createElement("div");
        expect(parentDiv).toBeDefined();
	});
});
/*
describe("add course button", function() {
		var form_course_add_button;
		var name;
		
		beforeEach(function() {
			form_course_add_button = jQuery('#course_add_button');
		});
		afterEach(function(){	
			name = jQuery('#course_name');
		});
		
		describe('add course name', function() {
			it('should add a course name', function() {
				form_course_add_button.click();
				expect(name.text().length).toBeGreaterThan(0);
			})
		})
});
*//*
describe("script",function(){
	var addCourse = new addCourse();
	it("calls the add course function", function() {		
		expect(addCourse).toBeDefined();
	});
});
	*/
