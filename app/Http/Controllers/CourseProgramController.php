<?php

namespace App\Http\Controllers;

use App\Models\CourseProgram;
use App\Http\Requests\StoreCourseProgramRequest;
use App\Http\Requests\UpdateCourseProgramRequest;
use Illuminate\Http\JsonResponse;

class CourseProgramController extends Controller
{
    /**
     * Display a listing of course programs
     */
    public function index(): JsonResponse
    {
        $coursePrograms = CourseProgram::with('course')->get();
        
        return response()->json([
            'success' => true,
            'data' => $coursePrograms
        ], 200); 
    }

    /**
     * Store a newly created course program
     */
    public function store(StoreCourseProgramRequest $request): JsonResponse
    {
        $courseProgram = CourseProgram::create($request->validated());
        $courseProgram->load('course');

        return response()->json([
            'success' => true,
            'message' => 'Course program created successfully',
            'data' => $courseProgram
        ], 201); 
    }

    /**
     * Display the specified course program
     */
    public function show(CourseProgram $courseProgram): JsonResponse
    {
        $courseProgram->load('course');

        return response()->json([
            'success' => true,
            'data' => $courseProgram
        ], 200); 
    }

    /**
     * Update the specified course program
     */
    public function update(UpdateCourseProgramRequest $request, CourseProgram $courseProgram): JsonResponse
    {
        $courseProgram->update($request->validated());
        $courseProgram->load('course');

        return response()->json([
            'success' => true,
            'message' => 'Course program updated successfully',
            'data' => $courseProgram
        ], 200); 
    }

    /**
     * Remove the specified course program
     */
    public function destroy(CourseProgram $courseProgram): JsonResponse
    {
        $courseProgram->delete();

        return response()->json([
            'success' => true,
            'message' => 'Course program deleted successfully'
        ], 200); 
    }

    /**
     * Get all programs for a specific course
     */
    public function getByCourse($courseId): JsonResponse
    {
        $coursePrograms = CourseProgram::where('course_id', $courseId)
            ->with('course')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $coursePrograms
        ], 200); 
    }
}
